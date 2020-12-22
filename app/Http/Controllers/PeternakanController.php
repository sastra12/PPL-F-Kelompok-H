<?php

namespace App\Http\Controllers;
use \App\Peternakan;
use \App\User;
use Auth;
use DB;
use \App\Prosesinvestasi;
use \App\Pengajuaninvestasi;
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
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        return view('dashboard.peternak.peternakan',compact('data','kondisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buatinvestasi(Request $request)
    {
        $validation = \Validator::make($request->all(),[
            'nominal'=> 'required|integer|min:6',

        ])->validate();
        $current_user = auth()->user()->id;
        $peternakan = Peternakan::select('id')->where('id_user',$current_user)->first();
        $id_Peternakan =(string)$peternakan->id;
        $ekstensi = ".pdf";
        $namaFile = $id_Peternakan . $ekstensi;

        // $idpeternak = Peternakan::select('id_user')->where('id',$current_user)->first();

        // dd($current_user);
        $data = new pengajuaninvestasi;
        // $request->requets->add(['id_peternakan'=>1]);
        $data->id_peternakan = $peternakan->id;
        // dd($data);
        $data->nominal = $request->input('nominal');
        $data->id_peternak = $current_user;
        // $data->saratperjanjian = $request->input('sarat');
        $data->status = 0;
        if($request->hasFile('suratPerjanjian')){
            $path = $request->file('suratPerjanjian')->move('suratPerjanjian/',$namaFile);
            $data->saratperjanjian = $namaFile;
            $data->save();
        }
        // dd($data);
        $data->save();
        return redirect()->route('dashboard');
        
    }


    
    public function pengajuaninvestasi(){
        $user = auth()->user()->id;
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        return view('dashboard.peternak.investasi',compact('kondisi'));
    }

    public function laporan()
    {   
        $user = auth()->user()->id;
        // $data = DB::table('prosesinvestasi')
        // ->join('pengajuaninvestasi','prosesinvestasi.id_pengajuan','=','pengajuaninvestasi.id')
        // ->join('peternakan','peternakan.id','=','pengajuaninvestasi.id_peternakan')
        // ->join('users','users.id','=','peternakan.id_user')
        // ->where('prosesinvestasi.id_peternak',$user)
        // ->where('users.id','=','prosesinvestasi.id_investor')
        // ->where('pengajuaninvestasi.status',1)
        // ->select('users.name','prosesinvestasi.created_at','prosesinvestasi.id_pengajuan')
        // ->get();
     
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        $investor = DB::table('users')
        ->join('prosesinvestasi','prosesinvestasi.id_investor','=','users.id')
        ->join('pengajuaninvestasi','pengajuaninvestasi.id','=','prosesinvestasi.id_pengajuan')
        ->where('prosesinvestasi.id_peternak',$user)
        ->where('prosesinvestasi.status','=',1)      
        ->select('users.name','pengajuaninvestasi.created_at','prosesinvestasi.id_pengajuan','prosesinvestasi.status')
        ->get();
        // dd($investor);
        return view('dashboard.peternak.laporan',compact('investor','kondisi'));
    }

    public function datalaporanbulanan($id){
        $user = auth()->user()->id;
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        $data = DB::table('biouser')
        ->join('users','users.id','=','biouser.id_user')
        // ->join('peternakan','peternakan.id_user','=','users.id')
        ->join('prosesinvestasi','prosesinvestasi.id_investor','=','users.id')
        ->join('pengajuaninvestasi','prosesinvestasi.id_pengajuan','=','pengajuaninvestasi.id')
        ->where('prosesinvestasi.id_pengajuan',$id)
        // ->where('users.id','=','prosesinvestasi.id_investor')
        ->select('users.name','biouser.alamat','biouser.notelepon','prosesinvestasi.bukti')
        ->get();

        $user = auth()->user()->id;
        $id_inv = Prosesinvestasi::select('id')->where('id_peternak',$user)->first();
        $id_proses = $id_inv->id;
        $data2 = DB::table('laporanbulanan')
        ->join('prosesinvestasi','prosesinvestasi.id','=','laporanbulanan.id_proses')
        // ->where('prosesinvestasi.id','=',$id_proses)
        ->where('laporanbulanan.id_proses',$id_proses)
        ->select('laporanbulanan.pemasukan','laporanbulanan.keteranganpemasukan','laporanbulanan.pengeluaran','laporanbulanan.keteranganpengeluaran','laporanbulanan.keuntungan','laporanbulanan.fotobukti','laporanbulanan.created_at')
        ->get();
        // dd($data);
        return view('dashboard.peternak.datalaporan',compact('data','kondisi','data2'));
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
            'nama'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'jmlkambingdewasa' => 'integer|digits_between:1,4',
            'jmlkambinganakan' => 'integer|digits_between:1,4',
            'avatar' => 'required',
            'avatar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
            // $peternakan->id_user = Auth::user()->id;

            // $peternakan->namapeternakan = $request->input('nama');
            // $peternakan->alamatpeternakan = $request->input('alamat');
            // $peternakan->jmlkambingdewasa = $request->input('jmlkambingdewasa');
            // $peternakan->jmlkambinganakan = $request->input('jmlkambinganakan');
            $input = $request->all();
            $images = array();
            if($files=$request->file('avatar')){
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move('avatars/',$name);
                    $images[]=$name;
                }
                // $path = $request->file('avatar')->move('avatars/',$request->file('avatar')->getClientOriginalName());
                // $peternakan->namagambar = $request->file('avatar')->getClientOriginalName();
                // $peternakan->save();
            }
            Peternakan::insert([
                'id_user' => Auth::user()->id,
                'namapeternakan'=> $input['nama'],
                'alamatpeternakan' => $input['alamat'],
                'jmlkambingdewasa' =>$input['jmlkambingdewasa'],
                'jmlkambinganakan' => $input['jmlkambinganakan'],
                'namagambar' => implode("|",$images),
            ]);
            // dd($request->all());
            // $peternakan->save();
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
        $validation = \Validator::make($request->all(),[
            'nama'=> 'required|max:50',
            'alamat'=> 'required|max:50',
            'jmlkambingdewasa' => 'integer|digits_between:1,4',
            'jmlkambinganakan' => 'integer|digits_between:1,4',
            'avatar.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
    ])->validate();
        $data = \App\Peternakan::where('id_user',$id)->first();
        
        $data->namapeternakan = $request->input('nama');
        $data->alamatpeternakan = $request->input('alamat');
        $data->jmlkambingdewasa = $request->input('jmlkambingdewasa');
        $data->jmlkambinganakan = $request->input('jmlkambinganakan');

        $awal = $data->namagambar;
        if($request->hasFile('avatar')){
            // \Storage::delete('avatars'.$awal);
            Storage::delete('avatars'.$awal);
            $path = $request->file('avatar')->move('avatars/',$request->file('avatar')->getClientOriginalName());
            $data->namagambar = $request->file('avatar')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        return redirect()->back()->with('messages','Data Berhasil di Update');
        
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
