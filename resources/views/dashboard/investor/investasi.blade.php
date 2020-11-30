@extends('master.app')

@section('title','Selamat Datang')

@section('main')

<section class="section">
  <div class="section-header">
    <h1>Article</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">Article</div>
    </div>
  </div>

  <div class="section-body">
    <div class="section-body">
      <h2 class="section-title">Article Style C</h2>
      <div class="row">
        @foreach ($data as $item)
        <div class="col-sm-4">
          <article class="article article-style-c">
            <div class="article-header">
              {{-- <div class="article-image" data-background="../assets/img/news/img13.jpg" style="background-image: url(&quot;../assets/img/news/img13.jpg&quot;);">
              </div> --}}
              <div class="article-image" src="avatars/{{$item->namagambar}}" style="background-image: url(avatars/{{$item->namagambar}});">
              </div>
            </div>
            <div class="article-details">
              <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
              <div class="article-title">
                <h2><a href="{{route('profilpeternak',['id'=>$item->id])}}">{{$item->namapeternakan}}</a></h2>
              </div>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. </p>
              <div class="article-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png">
                <div class="article-user-details">
                  <div class="user-detail-name">
                    <a href="#">{{$item->name}}</a>
                  </div>
                  <div class="text-job">{{$item->namapeternakan}}</div>
                </div>
              </div>
            </div>
          </article>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>



@endsection