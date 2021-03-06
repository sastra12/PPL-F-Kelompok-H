<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Pengajuaninvestasi;
use App\Biouser;
class ProfileController extends Controller
{
    //
    public function profile(){
      $user = auth()->user()->id;
      if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
          $kondisi = 1;
       }
       else{
           $kondisi=0;
       }
      $profile = Auth::user();
      $profile->load('biouser');
      // dd($profile);
      return view('dashboard.profile.profile',compact('profile','kondisi'));  
    }
    
    public function editprofile(Request $request,$id){
      $this->validate($request,[
        'nama' => 'required|max:50|alpha',
        'alamat' => 'required|max:50',
        'rekening' => 'required|max:16',
        'telepon' => 'required|max:12',
        'gambarktp.*' => 'image|max:2048|mimes:jpeg,png,jpg,gif,svg',
      ]);
      $user= User::find($id);
      $user= User::where('id',$id)->first();
      $user->name= $request->input('nama');
      $user->save();
      

      $biouser = new Biouser;
      // if($user->save()){
      // $biouser = Biouser::find($id);
      $biouser= Biouser::where('id_user',$user->id)->first();
      // $biouser->nik=$request->input('nik');
      $biouser->alamat=$request->input('alamat');
      $biouser->rekening=$request->input('rekening');
      $biouser->notelepon=$request->input('telepon');
      if($request->hasFile('gambarktp')){
        $path = $request->file('gambarktp')->move('avatars/',$request->file('gambarktp')->getClientOriginalName());
        $biouser->gambarktp = $request->file('gambarktp')->getClientOriginalName();
        $biouser->save();
    }
      $biouser->save();
      return redirect()->route('profile',$user->id)->with('success','Informasi Profile Berhasil di Update');
    }

    public function adminprofile(){
      $currentuser =Auth::user()->role_id=1;
      $profileadmin = DB::table('users')
            ->join('biouser', 'users.id', '=', 'biouser.id_user')
            ->select('users.id','users.name','users.email', 'biouser.notelepon')
            ->where('users.id',$currentuser)
            ->get();
      foreach ($profileadmin as $key ) {
        $data = [
          "id" => $key->id,
          "name" => $key->name,
          "email" => $key->email,
          "notelepon" =>$key->notelepon,
        ];
        // dd($data);
      }      
      return view('dashboard.profile.profile',compact('data'));
    }

    public function editprofiladmin(Request $request,$id){
      $validation = \Validator::make($request->all(),[
        'name'=> 'max:50',
        'email' => 'required|email|max:25',
        'notelepon'=> 'required|max:15',
        
      ])->validate();
      $user= User::find($id);
      $user= User::where('id',$id)->first();
      $user->name = $request->input('nama');
      $user->email = $request->input('email');
      $user->save();

      $biouser = new Biouser;
      $biouser= Biouser::where('id_user',$user->id)->first();
      $biouser->notelepon = $request->input('notelepon');
      $biouser->save();
      return redirect()->back()->with('success','Informasi Profile Berhasil di Update');
    }
}
