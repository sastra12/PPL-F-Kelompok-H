@extends('master.app')

@section('title','Selamat Datang')

@section('main')
  <div class="container">
    <section class="section">
      <div class="section-header">
        <h1>Form Validation</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Form Validation</div>
        </div>
      </div>
  
      <div class="section-body">
        <h2 class="section-title">Form Validation</h2>
        <p class="section-lead">
          Form validation using default from Bootstrap 4
        </p>
  
        <div class="row">
          <div class="col">
            <div class="card">
              @foreach ($fulldata as $item)
              <form action="{{route('penerimaaninvestasi',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data" id="penerimaaninvestasi">
                @csrf
                <div class="card-header">
                  <h4>Default Validation</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" class="form-control" value="{{$item->name}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Peternakan</label>
                    <input type="text" class="form-control" value="{{$item->namapeternakan}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" value="{{$item->alamat}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" class="form-control" value="{{$item->notelepon}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Rekening</label>
                    <input type="text" class="form-control" value="{{$item->rekening}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Kambing Dewasa</label>
                    <input type="text" class="form-control" value="{{$item->jmlkambingdewasa}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Kambing Anakan</label>
                    <input type="text" class="form-control" value="{{$item->jmlkambinganakan}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nominal Pengajuan</label>
                    <input type="text" class="form-control" value="{{$item->nominal}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Syarat Kerjasama</label>
                    <input type="text" class="form-control" value="{{$item->saratperjanjian}}" readonly>
                  </div>
                  <div class="form-group">
                    <label>Upload Bukti</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" autocomplete="off" name="bukti" value="">
                    @error('avatar')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Sarat Perjanjian</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pesan"></textarea>
                    @error('nama')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  @endforeach
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
@endsection