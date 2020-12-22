@extends('master.app')
@section('title', 'Form Laporan')
 
 
@section('main')
 
<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <form action="{{route('storeform')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="card-header">
              <h4>Form Laporan</h4>
            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @elseif(session()->has('message'))
            <div class="alert alert-success">
              {{ session()->get('message') }}
            </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label>Nominal Pemasukan</label>
                <p>(hasil penjualan hasil ternak)</p>
                <input type="number" class="form-control @error('pemasukan') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" >
                @error('pemasukan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pemasukan</label>
                <textarea class="form-control @error('ket_masuk') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" ></textarea>
                @error('ket_masuk')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Nominal Pengeluaran</label>
                <p>(penggunaan uang investasi)</p>
                <input type="number" class="form-control @error('pengeluaran') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" >
                @error('pengeluaran')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pengeluaran</label>
                <textarea class="form-control @error('ket_keluar') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" ></textarea>
                @error('ket_keluar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label>Keuntungan</label>
                <textarea class="form-control @error('ket_keluar') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="keuntungan" ></textarea>
                @error('keuntungan')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div> --}}
              <div class="form-group">
                <label>Foto bukti</label>
                <input type="file" class="form-control @error('ftbkt') is-invalid @enderror" autocomplete="off" name="ftbkt" value="">
                @error('ftbkt')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection