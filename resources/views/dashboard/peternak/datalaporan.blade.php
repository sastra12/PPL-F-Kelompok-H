@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Profile</div>
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
                </div>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
</div>
  </section>
@endsection