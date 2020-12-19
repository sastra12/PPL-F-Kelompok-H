@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div> -->
      </div>
    </div>
    <div class="col-auto mb-3">
      <div class="card" style="width: 70rem;">
        <div class="section-body">
          <div class="card profile-widget">
              @foreach ($data as $item)
                <div class="profile-widget-header">
                  <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                </div>
                <div class="col-auto mb-3">
                  <div class="card" style="width: 68rem;">
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
<<<<<<< Updated upstream
                <!-- </div> -->
                </div>
<<<<<<< Updated upstream
              </div>
=======
                  </div>
                  </div>
                    <!-- form -->
                    <form class="needs-validation" novalidate="" enctype="multipart/form-data" action="" method="POST">
=======
                </div>
                <!-- form -->
                <form class="needs-validation" novalidate="" enctype="multipart/form-data" action="" method="POST">
>>>>>>> Stashed changes
                      @csrf
                        <div class="card-header">
                          <h4>Data Laporan bulanan</h4>
                        </div>
                        @if(session()->has('success'))
                          <div class="alert alert-success">
                            {{ session()->get('success') }}
                          </div>
                        @endif
                        <div class="card-body">
                        <div class="form-group">
                          <label>Nominal Pemasukan</label>
                          <p>(hasil penjualan hasil ternak)</p>
                          <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" >
                          @error('nama')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Keterangan pemasukan</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" ></textarea>
                          @error('nama')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Preview Gambar</label>
                            <div class="container">
                              <a href="/avatars/">lihat gambar</a>
                            </div>
                          @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Nominal Pengeluaran</label>
                          <p>(penggunaan uang investasi)</p>
                          <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" >
                          @error('nama')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Keterangan pengeluaran</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" ></textarea>
                          @error('nama')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                          <label>Preview Gambar</label>
                            <div class="container">
                              <a href="/avatars/">lihat gambar</a>
                            </div>
                          @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                        <!-- <div class="card-footer text-right">
                          <button class="btn btn-primary" type="submit">Save</button>
                        </div> -->
                    </form>
                    <!-- end form -->
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
              @endforeach
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
@endsection