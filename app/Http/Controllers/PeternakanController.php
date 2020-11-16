<?php

namespace App\Http\Controllers;
use \App\Peternakan;
use \App\User;
use Auth;
use Storage;
use Illuminate\Http\Request;

class PeternakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->id;
        $data = \App\Peternakan::where('id_user',$user)->first();
        // dd($data);
        return view('dashboard.peternak.peternakan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $validation = \Validator::make($request->all(),[
            'nama'=> 'required',
            'alamat'=> 'required|min:5',
            'jmlkambingdewasa' => 'integer|min:2',
            'jmlkambinganakan' => 'integer|min:2',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ])->validate();
    //  dd($request->all());
        try {
            // $user = \App\User::find($id);
            // $id = $user->id;
            // $users= new \App\User;
            
            //$current_user = auth()->user()->id;
           // $user = User::find($current_user);
            //dd($user);
            // $id = $user->id;
            // dd($user->id);
            $peternakan = new \App\Peternakan;
            // $request->request->add(['id_user'=> $current_user]);
            // dd($request);
            $peternakan->id_user = Auth::user()->id;
            // dd($peternakan);
            $peternakan->namapeternakan = $request->input('nama');
            $peternakan->alamatpeternakan = $request->input('alamat');
            $peternakan->jmlkambingdewasa = $request->input('jmlkambingdewasa');
            $peternakan->jmlkambinganakan = $request->input('jmlkambinganakan');
            // dd($request->all());
            // if($request->file('avatar')){
            //     $path = $request->file('avatar')->store('avatars', $request->file('avatar')->getClientOriginalName());
            //     $peternakan->namagambar = $request->file('avatar')->getClientOriginalName();
            // }
            if($request->hasFile('avatar')){
                $path = $request->file('avatar')->move('avatars/',$request->file('avatar')->getClientOriginalName());
                $peternakan->namagambar = $request->file('avatar')->getClientOriginalName();
                $peternakan->save();
            }
            // dd($request->all());
            $peternakan->save();
            return redirect('/dashboard');
            // return view('dashboard.peternakan.peternakan');
            // dd($peternakan);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        $data = \App\Peternakan::where('id_user',$id)->first();
        
        $data->namapeternakan = $request->input('nama');
        $data->alamatpeternakan = $request->input('alamat');
        $data->jmlkambingdewasa = $request->input('jmlkambingdewasa');
        $data->jmlkambinganakan = $request->input('jmlkambinganakan');
        // dd($data);
        // dd($request->all());
        // $awal = $user->namagambar;
        // if($data->namagambar && file_exists(storage_path('public/avatars' . $data->namagambar))){
        //         \Storage::delete('public/avatars'.$data->namagambar);
        //         // $file = $request->file('avatar')->store('avatars',$request->file('avatar')->getClientOriginalName() );
        //         // $data->avatar = $file;
        //         $path = $request->file('avatar')->move('avatars/',$request->file('avatar')->getClientOriginalName());
        //         $data->namagambar = $request->file('avatar')->getClientOriginalName();
        //         $data->save();
        //  }
        $awal = $data->namagambar;
        if($request->hasFile('avatar')){
            // \Storage::delete('avatars'.$awal);
            Storage::delete('avatars'.$awal);
            $path = $request->file('avatar')->move('avatars/',$request->file('avatar')->getClientOriginalName());
            $data->namagambar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
