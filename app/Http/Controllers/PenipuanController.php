<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class PenipuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.investor.penipuan');
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.investor.formPenipuan');
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
        // $validation = \Validator::make($request->all(),[
        //     'namapelapor' => 'required | min: 3',
        //     'alamat' => 'required | min: 5',
        //     'norek' => 'required | max: 16',
        //     'notelp' => 'required | max: 15',
        //     'email' => 'required',
        //     'keterangan' => 'required',
        //     'ftbkt_tipu' => 'requred | image | mimes:jpeg,png,jpg,gif,svg ',
        // ])->validate();
        // try {
        //     $penipuan = new LaporanPenipuan();
        //     $input = $request->all();
 
        //     $ftbkt_tipu = $request->file('ftbkt_tipu');
        //     $imageName = $ftbkt_tipu->getClientOriginalName();
        //     $filename = pathinfo($imageName, PATHINFO_FILENAME);
        //     $ext = $request->file('ftbkt_tipu')->getClientOriginalExtension();
        //     $tgl = Carbon::now()->format('dmYHis');
        //     $newname = $filename . $tgl . "." . $ext;
        //     $ftbkt_tipu -> move(public_path('test'),$newname);
 
        //     $penipuan->ftbkt_tipu = $newname;
        //     $penipuan->id_penipuan = Auth::();
        //     $penipuan->nama = $request->namapelapor;
        //     $penipuan->alamat = $request->alamat;
        //     $penipuan->noRek = $request->norek;
        //     $penipuan->noTelp = $request->notelp;
        //     $penipuan->email = $request->email;
        //     $penipuan->ketTipu = $request->keterangan;
        //     $penipuan->save();
        //     return redirect('/penipuan');
        // } catch (\Throwable $th) {
        //     return $e ->getMessage();
        // }
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