<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use \App\Pengajuaninvestasi;
use Validator;
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
            'pemasukan' => 'required | min:1',
            'ket_masuk' => 'required | min:1',
            'ftbkt_in' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'pengeluaran' => 'required | min:1',
            'ket_keluar' => 'required | min:1',
            'ftbkt_out' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ])->validate();
        // dd($validation);
        try{
            $laporan = new laporanBulanan();
            $input = $request->all();
            $images = array();
            // if($files = $request->file('avatar')){
            // foreach ($files as $file) {
            //     $name = $file->getClientOriginalName();
            //     $file->move('avatars/',$name);
            //     $images[] = $name;
            //     }
            // }
            // Laporan::insert([
            //     'id_laporan' => Auth::user()->id,
            //     'pemasukan' =>  $input['pemasukan'],
            //     'ket_masuk' => $input['ket_masuk'],
            //     'ftbkt_in' => $input['ftbkt_in'],
            //     'pengeluaran' => $input['pengeluaran'],
            //     'ket_keluar' => $input['ket_keluar'],
            //     'ftbkt_out' => $input['ftbkt_out'],
            // ]);
            $ftbkt_in = $request->file('ftbkt_in');
            $imageName = $ftbkt_in->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $ext = $request->file('ftbkt_in')->getClientOriginalExtension();
            $tgl = Carbon::now()->format('dmYHis');
            $newname = $filename . $tgl . "." . $ext;
            $ftbkt_in->move(public_path('test'), $newname);
 
            $ftbkt_out = $request->file('ftbkt_out');
            $imageName1 = $ftbkt_out->getClientOriginalName();
            $filename1 = pathinfo($imageName1, PATHINFO_FILENAME);
            $ext1 = $request->file('ftbkt_in')->getClientOriginalExtension();
            $tgl1 = Carbon::now()->format('dmYHis');
            $newname1 = $filename1 . $tgl1 . "." . $ext1;
            $ftbkt_out->move(public_path('test'), $newname1);
 
            $laporan->ftbkt_in = $newname;
            $laporan->ftbkt_out = $newname1;
            $laporan->id_laporan = Auth::user()->id;
            $laporan->pemasukan = $request->pemasukan;
            $laporan->ket_masuk = $request->ket_masuk;
            // $laporan->ftbkt_in = $request->ftbkt_in;
            $laporan->pengeluaran = $request->pengeluaran;
            $laporan->ket_keluar = $request->ket_keluar;
            // $laporan->ftbkt_out = $request->ftbkt_out;
 
            // dd($laporan);
            $laporan->save();
            return redirect('/laporanbulanan');
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