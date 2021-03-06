@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      {{-- <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
      </div> --}}
    </div>
    <div class="col-auto mb-3">
      <div class="card" style="width: 100rem;">
        <div class="section-body">
          <div class="card profile-widget">
              @foreach ($data as $item)
                <div class="profile-widget-header">
                  <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                </div>
                <div class="col-auto mb-3">
                  <div class="card" style="width: 98rem;">
                <div class="card">
                  <div class="card-header">
                    <h4>Investor</h4>
                  </div> 
                    <div class="card-body">
                      <table>
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>{{$item->name}}</td>
                        </tr>
                        <tr>
                          <td>ALamat</td>
                          <td>:</td>
                          <td>{{$item->alamat}}</td>
                        </tr>
                        <tr>
                          <td>No Tlp</td>
                          <td>:</td>
                          <td>{{$item->notelepon}}</td>
                        </tr>
                      </table>                      
                    </div>
                  <div class="card-footer bg-whitesmoke">
                    <center>
                      Foto bukti
                      <br>
                      <a href="/avatars/{{$item->bukti}}">lihat gambar</a>
                    </center>
                  </div>
                </div>
                </div>
              </div>
            @endforeach
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Laporan Bulanan</h4>
                    <div class="card-header-form">
                      <form action="{{route('search')}}" method="get">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search" name="data" autocomplete="off" id="search">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search" id="mydata"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th>No</th>
                            <th>Pemasukan</th>
                            <th>Keterangan Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Keterangan Pengeluaran</th>
                            <th>Keuntungan</th>
                            <th>Foto Bukti</th>
                            <th>Tanggal Upload</th>
                          </tr>
                        </thead>
                        <tbody>
                          {{-- @if ($data->count() > 0) --}}
                          @foreach ($data2 as $item)
                          <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$item->pemasukan}}</td>
                            <td>{{$item->keteranganpemasukan}}</td>
                            <td>{{$item->pengeluaran}}</td>
                            <td>{{$item->keteranganpengeluaran}}</td>
                            <td>{{$item->keuntungan}}</td>
                            <td>
                                <img src="/avatars/{{$item->fotobukti}}" height="100px" width="100px" />
                            </td>
                            <td>{{$item->created_at}}</td>   
                          </tr>
                          @endforeach
    
                        </tbody>  
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
@endsection