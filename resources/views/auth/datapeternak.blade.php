
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Data Peternak &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <div class="card-body">
                <form method="POST" action="{{route('datapeternakan')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="first_name">Nama Peternakan</label>
                      <input value="{{old('name')}}" id="first_name" type="text" class="form-control  {{$errors->first('name') ? "is-invalid" : ""}}" name="nama" autofocus autocomplete="off">  
                      <div class="invalid-feedback">
                        {{$errors->first('name')}}
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Alamat Peternakan</label>
                    <input value="{{old('alamat')}}" id="alamat" type="text" class="form-control {{$errors->first('alamat') ? "is-invalid" : ""}}" name="alamat" autocomplete="off">
                    <div class="invalid-feedback">
                      {{$errors->first('alamat')}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="password" class="d-block">Jumlah Kambing Dewasa</label>
                      <input value="{{old('jmlkambingdewasa')}}"  class="form-control pwstrength {{$errors->first('jmlkambingdewasa') ? "is-invalid" : ""}}" name="jmlkambingdewasa">
                      <div class="invalid-feedback">
                        {{$errors->first('jmlkambingdewasa')}}
                      </div>
                    </div>
                    {{-- <div class="form-group col-12">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input value="{{old('password-confirm')}}" id="password2" type="password" class="form-control" name="password-confirm">
                    </div> --}}
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="first_name">Jumlah Kambing Anakan</label>
                      <input value="{{old('jmlkambinganakan')}}" id="first_name" type="text" class="form-control {{$errors->first('jmlkambinganakan') ? "is-invalid" : ""}}" name="jmlkambinganakan" autofocus autocomplete="off">
                      <div class="invalid-feedback">
                        {{$errors->first('jmlkambinganakan')}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                        <label for="first_name">Avatar</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" autocomplete="off" name="avatar">
                        @error('avatar')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                  </div>
                  {{-- <div class="row">
                    <div class="form-group col-12">
                      <label for="first_name">Rekening</label>
                      <input value="{{old('rekening')}}" id="first_name" type="text" class="form-control {{$errors->first('rekening') ? "is-invalid" : ""}}" name="rekening" autofocus autocomplete="off">
                      <div class="invalid-feedback">
                        {{$errors->first('rekening')}}
                      </div>
                    </div>
                  </div> --}}
                  {{-- <div class="row">
                    <div class="form-group col-12">
                      <label for="first_name">No Telepon</label>
                      <input value="{{old('notelepon')}}" id="first_name" type="text" class="form-control {{$errors->first('notelepon') ? "is-invalid" : ""}}" name="notelepon" autofocus autocomplete="off">
                      <div class="invalid-feedback">
                        {{$errors->first('notelepon')}}
                      </div>
                    </div>
                  </div> --}}
                  {{-- <div class="row">
                    <div class="form-group col-12">
                      <label>Role Pilihan</label>
                      <select class="form-control selectric" name="role_id">
                        <option value="2">Peternak</option>
                        <option value="3">Investor</option>
                      </select>
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="../node_modules/selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>
</body>
</html>
