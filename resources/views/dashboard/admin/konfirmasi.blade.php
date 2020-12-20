@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<section class="section">
    {{-- <div class="section-header">
      <h1>Table</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Components</a></div>
        <div class="breadcrumb-item">Table</div>
      </div>
    </div> --}}
    
    <div class="section-body">
      <div class="section-header">
        <h1>Data</h1>
      </div>
      @if(session()->has('pesan'))
      <div class="alert alert-success">
          {{ session()->get('pesan') }}
      </div>
      @endif
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Investor</h4>
                <div class="card-header-form">
                  {{-- <form action="{{route('search')}}" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="data" autocomplete="off" id="search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search" id="mydata"></i></button>
                      </div>
                    </div>
                  </form> --}}
                </div>
              </div>
              <div class="">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th>No</th>
                        {{-- <th>Nama Peternakan</th> --}}
                        <th>Bukti Pembayaran</th>
                        <th>File Perjanjian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        {{-- <th>Gambar</th>
                        <th>Aksi</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @if ($data->count() > 0) --}}
                      @foreach ($data as $item)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>
                            <a href="/avatars/{{$item->bukti}}">{{$item->bukti}}</a>
                        </td>
                        <td>
                            <a href="/suratPerjanjian/{{$item->pesan}}">{{$item->pesan}}</a>
                        </td>
                        @if($item->status == 0)
                            <td>Belum di Konfirmasi</td>
                        @else
                            <td>Sudah di Konfirmasi</td>
                        @endif
                        <td>
                            <a href="{{route('konfirmasistatus',[$item->id])}}">
                                <span class="btn btn-primary">Konfirmasi</span> 
                            </a>
                        </td>
                      </tr>
                      @endforeach
                      {{-- @endif --}}
                    </tbody>  
                  </table>
                  {{-- {{$data->links() }} --}}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection

