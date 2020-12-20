@extends('master.app')
@section('title', 'Form Laporan')
 
 
@section('main')
 
<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="card-header">
              <h4>Form Laporan Penipuan</h4>
            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
            <div class="card-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="namapelapor" value="" >
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" ></textarea>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>No Rekening</label>
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="norek" value="">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>No Telepon</label>
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="notelp" value="" >
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="email" value="">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan Penipuan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan" ></textarea>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Foto bukti penipuan</label>
                <input type="file" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="ftbkt_tipu" value="">
                @error('nama')
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