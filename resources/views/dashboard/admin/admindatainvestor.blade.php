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
      <div class="row">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Investor</h4>
                <div class="card-header-form">
                  <form action="{{route('search')}}" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="data" autocomplete="off">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>No rekening</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->notelepon}}</td>
                        <td>{{$item->rekening}}</td>
                        <td>{{$item->role_name}}</td>
                      </tr>
                      @endforeach
                    </tbody>  
                  </table>
                  {{-- {{$data->links() }} --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection