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
      {{-- <p class="section-lead">
        Change information about yourself on this page.
      </p> --}}
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
      @endif
      <div class="row mt-sm-4">
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
            <form method="post" class="needs-validation" novalidate="" action="/profile/{{$profile->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control {{$errors->first('nama') ? "is-invalid" : ""}}" value="{{$profile->name}}"  name="nama" autocomplete="off">
                      <div class="invalid-feedback">
                        {{$errors->first('nama')}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control  {{$errors->first('alamat') ? "is-invalid" : ""}}" autocomplete="off" value="{{$profile->biouser->alamat}}" name="alamat">
                        <div class="invalid-feedback">
                          {{$errors->first('alamat')}}
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>No Rekening</label>
                        <input type="text" class="form-control  {{$errors->first('rekening') ? "is-invalid" : ""}}" autocomplete="off" value="{{$profile->biouser->rekening}}" name="rekening">
                        <div class="invalid-feedback">
                          {{$errors->first('rekening')}}
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>No Telepon</label>
                        <input type="text" class="form-control  {{$errors->first('telepon') ? "is-invalid" : ""}}" value="{{$profile->biouser->notelepon}}" name="telepon" autocomplete="off">
                        <div class="invalid-feedback">
                          {{$errors->first('telepon')}}
                        </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Update Foto Ktp</label>
                        <input type="file" class="form-control {{$errors->first('gambarktp') ? "is-invalid" : ""}}" value=""  name="gambarktp">
                        <div class="invalid-feedback">
                          {{$errors->first('gambarktp')}}
                        </div>
                      </div>
                  </div>
                  <a href="avatars/{{$profile->biouser->gambarktp}}">Preview Foto</a>
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