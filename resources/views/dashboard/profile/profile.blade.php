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
    <div class="section-body">
      <h2 class="section-title">{{$profile->name}}</h2>
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
              <!-- <div class="profile-widget-items">
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
              </div> -->
            </div>
            <div class="profile-widget-description">
<<<<<<< Updated upstream
              <div class="profile-widget-name">{{auth()->user()->name}}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{auth()->user()->role_id}}</div></div>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis ab velit quia sit placeat saepe corrupti aliquid architecto iure deleniti explicabo provident exercitationem corporis temporibus commodi dignissimos, nihil accusantium nam.
              Voluptatum fugit eveniet et soluta exercitationem recusandae. Qui voluptatum officiis quaerat natus libero odit sapiente, vel dolore sunt tenetur, sed hic quibusdam cupiditate autem fugiat eum! Magni ratione rem vero!
              Placeat nemo asperiores, nobis eos quaerat amet praesentium saepe fuga sapiente doloremque exercitationem, esse ea neque aliquam pariatur iusto velit! Culpa labore dolorem impedit eum quos non dolor corrupti quia?.
=======
              <div class="profile-widget-name">{{auth()->user()->name}}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div>{{auth()->user()->role_id}}</div></div>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Obcaecati ratione praesentium voluptas, maiores, enim assumenda, magnam sint placeat omnis iste rem! Nam doloremque fugiat eligendi non vitae inventore magni alias.
              Nisi repudiandae minus omnis corrupti excepturi sequi, reprehenderit totam delectus necessitatibus repellendus veritatis voluptates, ratione fugiat, ducimus harum unde explicabo esse modi suscipit architecto. Facere cumque officiis quam asperiores cum.
              Dignissimos cum alias repellendus? Reprehenderit facere doloremque perspiciatis suscipit esse eos recusandae odit excepturi, vel optio eveniet sapiente vero neque at culpa soluta, libero eligendi non ducimus, nesciunt quaerat rem.
>>>>>>> Stashed changes
            </div>
            <!-- <div class="card-footer text-center">
              <div class="font-weight-bold mb-2">Follow {{auth()->user()->name}} On</div>
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
            </div> -->
          </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
          <div class="card">
            <form method="post" class="needs-validation" novalidate="" action="/profile/{{$profile->id}}">
                @csrf
              <div class="card-header">
                <h4>Edit Profile</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-6 col-12">
                      <label>Nama Lengkap</label>
                      <input type="text" class="form-control" value="{{$profile->name}}" required="" name="nama">
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
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection