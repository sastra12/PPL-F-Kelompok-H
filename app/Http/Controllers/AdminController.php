<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    //
    public function datainvestor(){
        
        // $data = User::with('biouser')->where('role_id',3)->get();
        $data= DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->select('users.name');
        
        return view('dashboard.admin.datainvestor',compact('data'));
    }
}
