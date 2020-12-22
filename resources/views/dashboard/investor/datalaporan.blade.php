@extends('master.app')
@section('title', 'Form Laporan')
 
@section('main')
<section class="section">
    
    <div class="section-body">
      <div class="section-header">
        <h1>Data Laporan Bulanan</h1>
      </div>
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
                      @foreach ($data as $item)
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
  </section>
    
@endsection