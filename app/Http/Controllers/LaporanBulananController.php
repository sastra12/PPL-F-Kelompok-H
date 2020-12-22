<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use \App\Pengajuaninvestasi;
use Validator;
use \App\Prosesinvestasi;
use \App\Peternakan;
use \App\User;
use Auth;
use DB;
use Storage;
use \App\laporanBulanan;
use Carbon\Carbon;
 
class LaporanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        if (Pengajuaninvestasi::where('id_peternak', '=', $user)->exists()) {
            $kondisi = 1;
         }
         else{
             $kondisi=0;
         }
        return view('dashboard.peternak.formLaporanBulanan', compact('kondisi'));
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
    //    dd($request->ftbkt_in);
        $validation = \Validator::make($request->all(),[
            'pemasukan' => 'required|integer|digits_between:1,15',
            'ket_masuk' => 'required|max:500',
            'pengeluaran' => 'required|integer|digits_between:1,15',
            'ket_keluar' => 'required|max:500',
            // 'keuntungan' => 'required|integer|digits_between:1,15',
            'ftbkt' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ])->validate();
        // dd($validation);
        try{
            $lastdate = \App\LaporanBulanan::select('created_at')->latest()->first();
            $bulan = Carbon::parse($lastdate->created_at)->month;
            $year = Carbon::parse($lastdate->created_at)->year;
            
            $now = Carbon::now();
            $yearnow = $now->year;
            $bulannow = $now->month;
            // dd($bulannow);
            if($bulan==$bulannow&&$year==$yearnow){
                return back()->with('message','Anda hanya bisa input satu bulan satu kali');
            }
            else{
                $user = auth()->user()->id;
                // dd($user);
                $laporan = new \App\LaporanBulanan;
                $keuntungan = $request->input('pemasukan')-$request->input('pengeluaran');
                $data = Prosesinvestasi::select('id')->where('id_peternak',$user)->first();
                $laporan->id_proses = $data->id;
                $laporan->pemasukan = $request->input('pemasukan');
                $laporan->keteranganpemasukan = $request->input('ket_masuk');
                $laporan->pengeluaran = $request->input('pengeluaran');
                $laporan->keteranganpengeluaran = $request->input('ket_keluar');
                $laporan->keuntungan = $keuntungan;
                if($request->hasFile('ftbkt')){
                    $path = $request->file('ftbkt')->move('avatars/', $request->file('ftbkt')->getClientOriginalName());
                    $laporan->fotobukti =$request->file('ftbkt')->getClientOriginalName();
                    $laporan->save();
                }
                $laporan->save();
    
                return redirect('/laporanbulanan')->with('success','Data berhasil ditambahkan');
            }
       
        }catch (\Exception $e) {
            return $e -> getMessage();
        }
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data = laporanBulanan::where('id_user', $id)->get();
        // dd($data->user()->first()->id);
        // $data->pemasukan = $request->input('pemasukan');
        // $data->ket_masuk = $request->input('ket_masuk');
        // $data->ftbkt_in = $request->input('ftbkt_in');
        // $data->pengeluaran = $request->input('pengeluaran');
        // $data->ket_keluar = $request->input('ket_keluar');
        // $data->ftbkt_out = $request->input('ftbkt_out');
       
        return view('dashboard.peternak.datalaporan', compact('data'));
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