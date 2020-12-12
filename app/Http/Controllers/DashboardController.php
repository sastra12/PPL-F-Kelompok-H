<?php

namespace App\Http\Controllers;
use \App\Pengajuaninvestasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $user = auth()->user()->id;
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        return view('dashboard.index',compact('kondisi'));
    }

    
}
