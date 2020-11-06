@extends('master.app')

@section('title','Selamat Datang')

@section('main')
<div class="col-12 col-md-12 col-lg-7">
    <div class="card">
      <form method="post" action="/postnewpassword">
          @csrf
        <div class="card-header">
          <h4>Security Password</h4>
        </div>
        @if(session()->has('failed'))
            <div class="alert alert-danger">
              {{ session()->get('failed') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-body">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Password Lama</label>
                <input type="password" class="form-control" name="old_password" autocomplete="off" value="{{old('old_password')}}">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Password Baru</label>
                <input type="password" value="{{old('password')}}" class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" name="password" autocomplete="off">
                <div class="invalid-feedback">
                  {{$errors->first('password')}}
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                  <label>Confirm Password Baru</label>
                  <input type="password" value="{{old('password_confirmation')}}" class="form-control"  name="password_confirmation" autocomplete="off">
              </div>
            </div>
        </div>
            <div class="card-footer text-left">
              <button class="btn btn-primary">Save Changes</button>
            </div>
        </div>
      </form>
    </div>
@endsection