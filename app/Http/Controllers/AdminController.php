<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Prosesinvestasi;
class AdminController extends Controller
{
    //
    public function datauser(){
        
        // $data = User::with('biouser')->where('role_id',3)->get();
        $data= DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->join('roles','users.role_id','=','roles.id')
        ->where('role_id','=',3)
        ->orWhere('role_id','=',2)
        ->select('users.name','users.email','biouser.alamat','biouser.rekening','biouser.notelepon','roles.role_name')
        // ->paginate(3);
        ->get();
        // $data = User::with('biouser')->where('role_id',3)->paginate(3);
        
        return view('dashboard.admin.datainvestor',compact('data'));
    }

    public function adminpeternakan()
    {
        $data = DB::table('peternakan')
        ->join('users','users.id','=','peternakan.id_user')
        ->where('users.role_id','=',2)
        ->select('peternakan.namapeternakan','alamatpeternakan','jmlkambingdewasa','jmlkambinganakan','namagambar')
        ->get();

        return view ('dashboard.admin.datapeternak',compact('data'));
    }

    public function search(Request $request){
        
        $keyword = $request->data;
        $data = DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->join('roles','users.role_id','=','roles.id')
        // ->where('role_id','=',3)
        ->where('users.name',"LIKE","%$keyword%")
        ->select('users.name','users.email','biouser.alamat','biouser.rekening','biouser.notelepon','roles.role_name')
        // ->paginate(3);
        ->get();
        // dd($data);
        return view('dashboard.admin.datainvestor',compact('data'));
    }

    public function uploadSuratPerjanjianView(){

        return view('dashboard.admin.uploadperjanjian');
    }

    public function uploadSuratPerjanjian(Request $request){
        if($request->hasFile('suratPerjanjian')){
            $path = $request->file('suratPerjanjian')->move('suratPerjanjian/','CurrentPerjanjian.pdf');
        }
        // dd($request);
        return view('dashboard.admin.uploadperjanjian');
    }

    public function konfirmasi(){
        $data = DB::table('prosesinvestasi')
        ->select('prosesinvestasi.bukti','prosesinvestasi.pesan','prosesinvestasi.status','prosesinvestasi.id')
        ->get();
        return view('dashboard.admin.konfirmasi',compact('data'));
    }

    public function konfirmasistatus($id){
        $data = Prosesinvestasi::where('id',$id)->update(['status' => 1]);
        return back()->with('pesan','Status berhasil diubah');
    }
}
