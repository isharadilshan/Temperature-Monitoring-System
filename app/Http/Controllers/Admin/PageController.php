<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\User\device;
use App\Charts\Mold;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.main');
    }

    public function getMolds($id){
        $device = device::find($id);
        $molds_array=array();
        foreach($device->molds as $mold){
            array_push($molds_array,$mold->name);
        }

        $data_array=array();
        $data_array=$molds_array;
        foreach($molds_array as $mold){
            $data_array[$mold] = DB::table($mold)->get();
        }

        $chart = new Mold;

        $chart->labels(['One', 'Two', 'Three']);

        return($data_array);
        return view('admin.graph',compact('molds_array'));
    }
}
