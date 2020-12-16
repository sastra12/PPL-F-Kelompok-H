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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Investor</h4>
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
                        <th>Nama Peternakan</th>
                        <th>Alamat Peternakan</th>
                        <th>Jumlah Kambing Dewasa</th>
                        <th>Jumlah Kambing Anakan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @if ($data->count() > 0) --}}
                      @foreach ($data as $item)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$item->namapeternakan}}</td>
                        <td>{{$item->alamatpeternakan}}</td>
                        <td>{{$item->jmlkambingdewasa}}</td>
                        <td>{{$item->jmlkambinganakan}}</td>
                        <td>
                            <img src="/avatars/{{$item->namagambar}}" height="100px" width="100px" />
                        </td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop"> --}}
                                <a href="">
                                    <span class="glyphicon glyphicon-level-up" data-target="#staticBackdrop" data-toggle="modal"></span>
                                    {{-- <button type="button" data-target="#staticBackdrop" data-toggle="modal"><span class="glyphicon glyphicon-level-up"></span></button> --}}
                                </a>
                            {{-- </button> --}}
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
    
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
@endsection

