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
    <div class="section-body">
      {{-- <h2 class="section-title">{{$profile->name}}</h2> --}}
      <p class="section-lead">
        Change information about yourself on this page.
      </p>
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
      @endif
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Posts</div>
                  <div class="profile-widget-item-value">187</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Followers</div>
                  <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Following</div>
                  <div class="profile-widget-item-value">2,1K</div>
                </div>
              </div>
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">Lorem Ipsum<div class="text-muted d-inline font-weight-normal"><div class="slash"></div>Lorem Ipsum</div></div>
              Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
            </div>
            {{-- <div class="card-footer text-center">
              <div class="font-weight-bold mb-2">Follow Ujang On</div>
              <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-github mr-1">
                <i class="fab fa-github"></i>
              </a>
              <a href="#" class="btn btn-social-icon btn-instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </div> --}}
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            {{-- @foreach ($profileadmin as $item) --}}
            @if(auth()->user()->role_id==1)
            <form method="post" class="needs-validation" novalidate="" action="{{route('editprofiladmin',['id'=>$data['id']])}}">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                {{-- @foreach ($profileadmin as $item) --}}
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{$data['name']}}" name="nama" autocomplete="off">
                    <div class="invalid-feedback">
                      {{$errors->first('name')}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Email</label>
                    <input type="text" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" value="{{$data['email']}}" name="email" autocomplete="off">
                    <div class="invalid-feedback">
                      {{$errors->first('email')}}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>No Telepon</label>
                    <input type="text" class="form-control {{$errors->first('notelepon') ? "is-invalid" : ""}}" value="{{$data['notelepon']}}" name="notelepon" autocomplete="off">
                    <div class="invalid-feedback">
                      {{$errors->first('notelepon')}}
                    </div>
                  </div>
                </div>
                {{-- @endforeach --}}
                <div class>
                  <button class="btn btn-primary">Save Changes</button>
                </div>
              </div>
            </form>
            <div class="card-footer text-left">
              <a href="{{route('dashboard')}}"><button class="btn btn-primary">Batal</button></a>
            </div>
            @endif
            
            @if(auth()->user()->role_id != 1)
            <form method="post" class="needs-validation" novalidate="" action="/profile/{{$profile->id}}">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}" value="{{$profile->name}}" required="" name="nama">
                      <div class="invalid-feedback">
                        {{$errors->first('nama')}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nomor Induk Kependudukan</label>
                      <input type="text" class="form-control" value="{{$profile->biouser->nik}}" required="" name="nik">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" value="{{$profile->biouser->alamat}}" required="" name="alamat">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>No Rekening</label>
                        <input type="text" class="form-control" value="{{$profile->biouser->rekening}}" required="" name="rekening">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>No Telepon</label>
                        <input type="text" class="form-control" value="{{$profile->biouser->notelepon}}" required="" name="telepon">
                    </div>
                  </div>
                  </div>
                  <div class="card-footer text-left">
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
              </div>
            </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection