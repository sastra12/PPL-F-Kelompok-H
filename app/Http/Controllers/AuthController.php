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

    public function forgotpasswordview(){
        return view('auth.forgotpassword');
    }

    public function index(){
        return view('auth.datapeternak');
    }

    public function resetpassword(Request $request){
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
        ],
        [
            'email.required' => 'Data tidak boleh kosong,harap di isi'
        ]
        )->validate();
      
        // $user = Auth::id();
        // dd($user);
        $user = new \App\User;
        $user = $request->input('email');
        $user->password = \Hash::make($request->get('password'));
        // dd($user);
        if(User::where('email','=',$user)->exists()){
            
        }
        else{
            return back()->with('pesan','Email Belum Terdaftar');
        }
    }

    // public function ressetpassword(Request $request){
    //     $validator= \Validator::make($request->all(), [
    //         'password' => 'required|min:6|max:16',
    //     ])->validate();

    // }

    public function postregister(Request $request)
    {
        $validation = \Validator::make($request->all(),[
                'name'=> 'required',
                'email'=> 'required|email|regex:/(.*)@gmail\.com/i',
                'password' => 'required|min:6|max:16',
                // 'nik' => 'required|max:16',
                'alamat' => 'required',
                'rekening' => 'required|max:16',
                'notelepon' => 'required|max:15',
                'role_id' => 'required',
                'gambarktp'=> 'image|mimes:jpeg,png,jpg,gif,svg'
        ])->validate();
        $user = new \App\User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->get('password'));
        $user->remember_token = str_random(60);
        $user->role_id = $request->input('role_id');
        $user->save();
        //insert ke tabel biouser
        // $request->request->add(['id_user'=>$user->id]);
        // $biouser = \App\Biouser::create($request->all());
        $biouser =new \App\Biouser;
        $biouser->id_user = $user->id;
        $biouser->alamat=$request->input('alamat');
        $biouser->rekening=$request->input('rekening');
        $biouser->notelepon=$request->input('notelepon');
        // dd($biouser);
        // dd($request);
        if($request->hasFile('filektp')){
        $path = $request->file('filektp')->move('avatars/',$request->file('filektp')->getClientOriginalName());
        // dd($path);
        $biouser->gambarktp =  $request->file('filektp')->getClientOriginalName();;
        // dd($biouser);
        $biouser->save();
        }
        $biouser->save();

      
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
            'email' => 'required|max:25',
            'password' => 'required|min:8|max:16',
        ],
        [
            'email' => 'Data tidak boleh kosong,harap di isi',
            'password.required' => 'Password tidak boleh kosong, harap di isi'
        ])->validate();
        $user = $request->only('email','password');
        if(Auth::attempt($user)){
        // dd($user);
           return redirect('dashboard');
        }
        return redirect('/login')->with('message','Email atau password yang anda masukan tidak sesuai !!');
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
        return redirect('/');
    }
}
