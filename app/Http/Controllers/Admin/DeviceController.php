<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User\device;
use App\Model\User\mold;
use App\Model\User\person;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new DateTime;
        $date->modify('-5 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');

        $devices = device::all();

        foreach($devices as $device){
            foreach($device->molds as $mold){
                $result = DB::table($mold)->where('created_at','>=',$formatted_date)->get();
            }
        }
        return view('admin.device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $molds = mold::all();
        $persons = person::all();
        return view('admin.device.create',compact('molds','persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $device = new device();

        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
        ]);
        
        $device->name = $request->name;
        $device->subject = $request->subject;
        $device->save();
        $device->molds()->sync($request->molds);
        $device->persons()->sync($request->persons);
        return redirect(route('device.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = device::find($id);
        return view('admin.device.show',compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = device::with('molds','persons')->where('id',$id)->first();
        $molds = mold::all();
        $persons = person::all();
        return view('admin.device.edit',compact('device','molds','persons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = device::find($id);

        $this->validate($request,[
            'name' => 'required',
            'subject' => 'required',
        ]);
        
        $device->name = $request->name;
        $device->subject = $request->subject;
        $device->save();
        $device->molds()->sync($request->molds);
        $device->persons()->sync($request->persons);
        return redirect(route('device.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        device::where('id',$id)->delete();
        return redirect()->back();
    }
}
