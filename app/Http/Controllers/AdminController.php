<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
class AdminController extends Controller
{
    //
    public function datainvestor(){
        
        // $data = User::with('biouser')->where('role_id',3)->get();
        $data= DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->join('roles','users.role_id','=','roles.id')
        ->where('role_id','=',3)
        ->select('users.name','users.email','biouser.alamat','biouser.rekening','biouser.notelepon','roles.role_name')
        // ->paginate(3);
        ->get();
        // $data = User::with('biouser')->where('role_id',3)->paginate(3);
        
        return view('dashboard.admin.datainvestor',compact('data'));
    }

    public function search(Request $request){
        
        $keyword = $request->data;
        $data = DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->join('roles','users.role_id','=','roles.id')
        ->where('role_id','=',3)
        ->where('users.name',"LIKE","%$keyword%")
        ->select('users.name','users.email','biouser.alamat','biouser.rekening','biouser.notelepon','roles.role_name')
        // ->paginate(3);
        ->get();
        // dd($data);
        return view('dashboard.admin.datainvestor',compact('data'));
    }
}
