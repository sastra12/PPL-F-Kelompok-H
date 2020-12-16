@extends('master.app')

@section('title','Selamat Datang')

@section('main')

{{-- <section class="section">
  <div class="section-header">
    <h1>Upload Surat Perjanjian</h1>
    <!-- <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">Article</div>
    </div> -->
  </div>

  <div class="section-body">
    <div class="section-body">
      <div class="card" style="width: 75vw;">
        <form action="{{route('submitperjanjian')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label>Upload Template Perjanjian</label>
              <input type="file" class="form-control" autocomplete="off" name="suratPerjanjian" value="">
              <input class="btn btn-primary" type="submit" value="Upload"></input>
            </div>
          </div>
          <div class="card-footer text-right">
            <br>
            <center>
              <label>Preview Surat Perjanjian Saat Ini</label>
              <embed src="/suratPerjanjian/CurrentPerjanjian.pdf" style="width:60vwpx; height:800px;" frameborder="0">
            </center>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> --}}

<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <form action="{{route('submitperjanjian')}}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="card-header">
              <h4>Upload Surat Perjanjian</h4>
            </div>
            {{-- @if(session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif --}}
            <div class="card-body">
              <div class="form-group">
                <label>Upload Template Proposal</label>
                <input type="file" class="form-control" autocomplete="off" name="suratPerjanjian" value="">
                <br>
                <input class="btn btn-primary" type="submit" value="Upload"></input>
                {{-- <input type="text" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="nominal" value=""> --}}
                {{-- @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror --}}
              </div>
              <div class="container">
                <a href="/suratPerjanjian/CurrentPerjanjian.pdf">lihat gambar</a>
              </div>
              {{-- <div class="card-footer text-right">
                <br>
                <center>
                  <label>Preview Surat Perjanjian Saat Ini</label>
                  <embed src="/suratPerjanjian/CurrentPerjanjian.pdf" style="width:60vwpx; height:800px;" frameborder="0">
                </center>
              </div> --}}
              {{-- <div class="form-group">
                <label>Sarat Perjanjian</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="sarat"></textarea>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div> --}}
              {{-- <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
              </div> --}}
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

