<?php

namespace App\Http\Controllers;
use DB;
use \App\Peternakan;
use \App\Pengajuaninvestasi;
use \App\Prosesinvestasi;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gambar = DB::table('peternakan')
        // $image = DB::table('peternakan')->where('namagambar')
        $data = DB::table('peternakan')
        ->join('pengajuaninvestasi','peternakan.id','=','pengajuaninvestasi.id_peternakan')
        ->join('users','users.id','=','peternakan.id_user')
        ->where('pengajuaninvestasi.status',0)
        ->select('peternakan.namagambar','users.name','peternakan.id','peternakan.namapeternakan','peternakan.alamatpeternakan','peternakan.jmlkambingdewasa','peternakan.jmlkambinganakan')
        ->get();
        // $data = DB::table('peternakan')
        // ->join('pengajuaninvestasi','peternakan.id','=','pengajuaninvestasi.id_peternakan')
        // ->select('peternakan.id','peternakan.namapeternakan','peternakan.alamatpeternakan','peternakan.jmlkambingdewasa','peternakan.jmlkambinganakan')
        // ->get();
        return view('dashboard.investor.investasi',compact('data'));
    }

    public function profilpeternak($id){
        $data = Peternakan::find($id);
        $fulldata= DB::table('users')
        ->join('biouser','users.id','=','biouser.id_user')
        ->join('peternakan','peternakan.id_user','=','users.id')
        ->join('pengajuaninvestasi','pengajuaninvestasi.id_peternakan','=','peternakan.id')
        ->where('pengajuaninvestasi.id_peternakan','=',$id)
        ->select('peternakan.id','users.name','biouser.rekening','biouser.alamat','biouser.notelepon','peternakan.namapeternakan','peternakan.jmlkambingdewasa','peternakan.jmlkambinganakan','pengajuaninvestasi.nominal','pengajuaninvestasi.saratperjanjian')
        ->get();        
        //dd($fulldata);
        return view('dashboard.investor.profilepeternak',compact('fulldata'));
    }

    public function penerimaaninvestasi(Request $request,$id){
        $investor = auth()->user()->id;
        // $data = Pengajuaninvestasi::find('id_peternakan',$id);
        $data = Pengajuaninvestasi::where('id_peternakan',$id)->update(['status' => 1]);
        // dd($data);
        // $data->status = 1;
        // $data->save();
        $peternak = Pengajuaninvestasi::select('id_peternak')->where('id_peternakan',$id)->first();
        $idpengajuan = Pengajuaninvestasi::select('id')->where('id_peternakan',$id)->first();
        
        $id_Peternakan = $id;
        $ekstensi = ".pdf";
        $namaFile = $id_Peternakan . "Investor" . $ekstensi;
        $proses = new \App\Prosesinvestasi;
        $proses->id_pengajuan = $idpengajuan->id;
        $proses->id_peternak = $peternak->id_peternak;
        $proses->id_investor = $investor;
        $proses->status = 0;
        // $proses->pesan = $request->input('pesan');
        // dd($proses);
        if($request->hasFile('bukti')){
            $path = $request->file('bukti')->move('avatars/',$request->file('bukti')->getClientOriginalName());
            $proses->bukti = $request->file('bukti')->getClientOriginalName();
            // $proses->save();
        }
        if($request->hasFile('suratPerjanjian')){
            $path = $request->file('suratPerjanjian')->move('suratPerjanjian/',$namaFile);
            $proses->pesan = $namaFile;
        }
        // dd($proses);
        $proses->save();
        return redirect()->route('datainvestasi');
    }

    public function laporan(){
        $user = auth()->user()->id;
        $peternak = DB::table('users')
        ->join('prosesinvestasi','prosesinvestasi.id_peternak','=','users.id')
        ->join('pengajuaninvestasi','pengajuaninvestasi.id','=','prosesinvestasi.id_pengajuan')
        ->where('prosesinvestasi.id_investor',$user)
        ->where('prosesinvestasi.status',1)
        ->select('users.name','pengajuaninvestasi.created_at','prosesinvestasi.id_pengajuan')
        ->get();
        return view('dashboard.investor.laporaninvestor',compact('peternak'));
    }

    public function datalaporan($id){
        $user = auth()->user()->id;
        $id_inv = Prosesinvestasi::select('id')->where('id_investor',$user)->first();
        $id_proses = $id_inv->id;
        $data = DB::table('laporanbulanan')
        ->join('prosesinvestasi','prosesinvestasi.id','=','laporanbulanan.id_proses')
        // ->where('prosesinvestasi.id','=',$id_proses)
        ->where('laporanbulanan.id_proses',$id_proses)
        ->select('laporanbulanan.pemasukan','laporanbulanan.keteranganpemasukan','laporanbulanan.pengeluaran','laporanbulanan.keteranganpengeluaran','laporanbulanan.keuntungan','laporanbulanan.fotobukti','laporanbulanan.created_at')
        ->get();
        // dd($data);
        return view('dashboard.investor.datalaporan',compact('data'));
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
        //
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
