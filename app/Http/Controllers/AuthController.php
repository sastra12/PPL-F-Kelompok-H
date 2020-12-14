<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use DB;
use \Crypt;
use \App\Pengajuaninvestasi;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function back()
    {
        return view('landingpage.landingpage');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function index(){
        return view('auth.datapeternak');
    }


    public function postregister(Request $request)
    {
        $validation = \Validator::make($request->all(),[
                'name'=> 'required',
                'email'=> 'required|email',
                'password' => 'required|min:6|max:16',
                'nik' => 'required|max:16',
                'alamat' => 'required',
                'rekening' => 'required|max:16',
                'notelepon' => 'required|max:15',
                'role_id' => 'required',
        ])->validate();
        $user = new \App\User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->get('password'));
        $user->remember_token = str_random(60);
        $user->role_id = $request->input('role_id');
        $user->save();
        //insert ke tabel biouser
        $request->request->add(['id_user'=>$user->id]);
        $biouser = \App\Biouser::create($request->all());
        // dd($user->role_id = $request->input('role_id'));
        // if($user->role_)
        $lastvalue = DB::table('users')->latest()->first();

        if($lastvalue->role_id==2){
            $credentials = $request->only('email','password');
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect()->route('tambahdata');
            }
        }
        // dd($lastvalue);
        return redirect()->route('login')->with('success','Data berhasil ditambahkan');
    }

    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $validation = \Validator::make($request->all(),[
            'email'=> 'required|email|max:25',
            'password' => 'required|min:8|max:16',
        ],
        [
            'email.required' => 'Data tidak boleh kosong,harap di isi',
            'password.required' => 'Data tidak boleh kosong, harap di isi'
        ])->validate();
        $user = $request->only('email','password');
        if(Auth::attempt($user)){
        // dd($user);
           return redirect('dashboard');
        }
        return redirect('/login')->with('message','Data yang anda masukan salah!!');
    }

    public function securitypassword(){
        $user = auth()->user()->id;
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        return view('auth.securitypassword',compact('kondisi'));
    }

    public function updatepassword(Request $request)
    {   
        // $validation = \Validator::make($request->all(),[
        //     'password' => 'required|min:6|confirmed',
        // ])->validate();
        
        $old_password = auth()->user()->password;
        $current_user = auth()->user()->id;
        if(Hash::check($request->input('old_password'),$old_password))
        {
           $user = User::find($current_user);
           $validatedData = $request->validate([
            'password' => 'min:6|confirmed',
        ]);
            $user->password = Hash::make($request->input('password'));
            if($user->save()){
                return redirect()->back()->with('success','Password Behasil di Ubah');
            }
            else{
                return redirect()->back()->with('failed','Password Lama Invalid');
            }
        }
        else{
            return redirect()->back()->with('failed','Password Lama Invalid');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
