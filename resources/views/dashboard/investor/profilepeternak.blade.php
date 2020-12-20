@extends('master.app')

@section('title','Selamat Datang')

@section('main')
  <div class="container">
    <section class="section">
      <div class="section-header">
        <h1>Profil Peternakan</h1>
        {{-- <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Form Validation</div>
        </div> --}}
      </div>
  
      <div class="section-body">
        <div class="row">
          <div class="col">
            <div class="card">
              @foreach ($fulldata as $item)
              <form action="{{route('penerimaaninvestasi',['id'=>$item->id])}}" method="POST" enctype="multipart/form-data" id="penerimaaninvestasi">
                @csrf
                <div class="card-header">
                  <h4>Data Peternakan</h4>
                </div>
                <div class="card-body">
                  <h7>Untuk mengajukan investasi silahkan ikuti langkah langkah berikut :</h7>
                  <br>
                  <h7>1. Isi nominal investasi di bawah</h7>
                  <br>
                  <h7>2. Upload foto bukti transaksi</h7>
                  <br>
                  <h7>3. Upload file surat perjanjian yang sudah di tanda tangani oleh Peternak</h7>
                  <br>
                  <br>
                  <h7>Silahkan download surat perjanjian</h7>
                  <a href="/suratPerjanjian/{{$item->saratperjanjian}}.pdf">di sini</a>
                  <hr>
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
                  {{-- <div class="form-group">
                    <label>Surat Perjanjian</label>
                    <br>
                    <a href="/suratPerjanjian/{{$item->saratperjanjian}}">Download Surat Perjanjian</a>
                  </div> --}}
                  <div class="form-group">
                    <label>Upload Bukti</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" autocomplete="off" name="bukti" value="">
                    @error('avatar')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Upload Surat Perjanjian</label>
                    <input type="file" class="form-control" autocomplete="off" name="suratPerjanjian" value="" required>
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