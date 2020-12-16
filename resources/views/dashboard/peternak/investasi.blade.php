@extends('master.app')

@section('title','Selamat Datang')

@section('main')

<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <form class="needs-validation" novalidate="" action="{{route('investasi')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="card-header">
              <h4>Pengajuan Investasi</h4>
            </div>
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
            {{-- <div class="card-body">
              <div class="form-group">
                <label>Ajukan Nominal</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nominal" value="">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Sarat Perjanjian</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sarat"></textarea>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div> --}}
            <div class="card-body">
              <h7>Untuk mengajukan investasi silahkan ikuti langkah langkah berikut :</h7>
              <br>
              <h7>1. Isi nominal investasi di bawah</h7>
              <br>
              <h7>2. Upload file template surat perjanjian yang sudah di tanda tangani</h7>
              <br>
              <br>
              <h7>Silahkan download template surat perjanjian</h7>
              <a href="/suratPerjanjian/CurrentPerjanjian.pdf">di sini</a>
              <hr>
              <div class="form-group">
                <label>Ajukan Nominal</label>
                <input type="text" class="form-control {{$errors->first('nominal') ? "is-invalid" : ""}}" autocomplete="off" name="nominal" value="">
                <div class="invalid-feedback">
                  {{$errors->first('nominal')}}
                </div>
              </div>
              <div class="form-group">
                <label>Surat Perjanjian</label>
                <input type="file" class="form-control" autocomplete="off" name="suratPerjanjian" value="" >
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