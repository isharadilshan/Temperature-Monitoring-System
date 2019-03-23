<?php

namespace App\Http\Controllers\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\testmold1;

class PageController extends Controller
{
    public function index()
    {
        return view('page.main');
    }
    public function store(Request $request){
        // return($request);
        $testmold1 = new testmold1();
        $testmold1->temp1 = $request->input('t');
        $testmold1->temp2 = $request->input('t1');
        $testmold1->save();
    }
    
}
