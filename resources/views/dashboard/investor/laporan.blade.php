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
          @foreach ($peternak as $item)
          <div class="col-sm-12">
            <article class="article article-style-c">
              <div class="article-header">
                {{-- <div class="article-image" data-background="../assets/img/news/img13.jpg" style="background-image: url(&quot;../assets/img/news/img13.jpg&quot;);">
                </div> --}}
                <div class="article-image" src="" style=";">
                </div>
              </div>
              <div class="article-details">
                <h1>Investasi Masuk dari Investor</h1>
                <div class="article-title">
                  <h2><a href=""></a></h2>
                </div>
                <p>{{$item->created_at}}</p>
                <div class="article-user">
                  <img alt="image" src="../assets/img/avatar/avatar-1.png">
                  <div class="article-user-details">
                    <div class="user-detail-name">
                      <a href="#"></a>
                    </div>
                    <a href="{{route('datalaporanbulanan',['id'=>$item->id_pengajuan])}}"><div class="text-job">{{$item->name}}</div></a>
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