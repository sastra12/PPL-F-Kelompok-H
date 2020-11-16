@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <form class="needs-validation" novalidate="" enctype="multipart/form-data" action="{{route('updatepeternakan',['id'=>$data->id_user])}}" method="POST">
        @csrf
          <div class="card-header">
            <h4>Data Peternakan</h4>
          </div>
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @endif
          <div class="card-body">
            <div class="form-group">
              <label>Nama Peternakan</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nama" value="{{$data->namapeternakan}}">
              @error('nama')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Alamat Peternakan</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" autocomplete="off" name="alamat" value="{{$data->alamatpeternakan}}">
              @error('alamat')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Jumlah Kambing Dewasa</label>
              <input type="text" class="form-control @error('jmlkambingdewasa') is-invalid @enderror" autocomplete="off" name="jmlkambingdewasa" value="{{$data->jmlkambingdewasa}}">
              @error('jmlkambingdewasa')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Jumlah Kambing Anakan</label>
              <input type="text" class="form-control @error('jmlkambinganakan') is-invalid @enderror" autocomplete="off" name="jmlkambinganakan" value="{{$data->jmlkambinganakan}}">
              @error('jmlkambinganakan')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Foto Peternakan</label>
              <input type="file" class="form-control @error('avatar') is-invalid @enderror" autocomplete="off" name="avatar" value="{{$data->namagambar}}">
              @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Preview Gambar</label>
              <div class="container">
                <a href="/avatars/{{$data->namagambar}}">lihat gambar</a>
              </div>
              @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary" type="submit">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection