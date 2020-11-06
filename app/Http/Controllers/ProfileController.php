<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Biouser;
class ProfileController extends Controller
{
    //
    public function profile(){
      $profile = Auth::user();
      $profile->load('biouser');
      // dd($profile);
      return view('dashboard.profile.profile',compact('profile'));  
    }
    
    public function editprofile(Request $request,$id){
      $this->validate($request,[
        'nama' => 'required|min:5',
      ]);
      $user= User::find($id);
      $user= User::where('id',$id)->first();
      $user->name= $request->input('nama');
      // $user->save();
      if($user->save()){
      $biouser = Biouser::find($id);
      $biouser= Biouser::where('id',$id)->first();
      $biouser->nik=$request->input('nik');
      $biouser->alamat=$request->input('alamat');
      $biouser->rekening=$request->input('rekening');
      $biouser->notelepon=$request->input('telepon');
      $biouser->save();
      return redirect()->route('profile',$user->id)->with('success','Informasi Profile Berhasil di Update');
    }
      // dd($user);
      return redirect()->back()->with('error','Data tidak berhasil di update');
    }
}
