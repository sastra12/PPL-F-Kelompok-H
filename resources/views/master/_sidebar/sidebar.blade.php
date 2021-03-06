<div class="main-sidebar" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        @if(auth()->user()->role_id==2)
        <a href="">Peternak</a>
        @elseif(auth()->user()->role_id==3)
        <a href="">Investor</a>
        @endif
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        @if (auth()->user()->role_id==1)
        <li><a href="#"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
        <li><a href="{{route('datauser')}}"><i class="fas fa-columns"></i> <span>Data User</span></a></li>
        {{-- <li><a href="{{route('datapeternak')}}"><i class="far fa-square"></i> <span>Data Peternak</span></a></li> --}}
        <li><a href="{{route('adminpeternak')}}"><i class="fas fa-th-large"></i> <span>Data Peternakan</span></a></li>
        <li><a href="#"><i class="fas fa-th"></i> <span>Data Laporan Bulanan</span></a></li>
        <li><a href="#" ><i class="far fa-file-alt"></i> <span>Data Laporan Penipuan</span></a></li>
        <li><a href="{{route('konfirmasi')}}" ><i class="far fa-file-alt"></i> <span>Data Investasi</span></a></li>
        <li><a href="{{route('uploadperjanjian')}}" ><i class="far fa-file-alt"></i> <span>Surat Perjanjian Investasi</span></a></li>
        @elseif(auth()->user()->role_id==2)
        <li><a href="{{route('dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        <li><a href="{{route('peternakan')}}"><i class="fas fa-th-large"></i> <span>Data Peternakan</span></a></li>
        @if($kondisi==0)
        <li><a href="{{route('pengajuaninvestasi')}}" ><i class="fas fa-th"></i> <span>Pengajuan Investasi</span></a></li>
        @elseif($kondisi==1)
        {{-- <li><a href="{{route('pengajuaninvestasi')}}" ><i class="fas fa-th"></i> <span>Update Investasi</span></a></li> --}}
        @endif
        <li><a href="{{route('laporanbulanan')}}" ><i class="far fa-file-alt"></i> <span>Data Laporan Bulanan</span></a></li>
        @else
        <li><a href="{{route('datainvestasi')}}"><i class="fas fa-columns"></i> <span>Data Investasi</span></a></li>
        <li><a href="{{route('penipuan')}}"><i class="fas fa-th"></i> <span>Laporan Penipuan</span></a></li>
        <li><a href="{{route('laporan')}}"><i class="fas fa-th-large"></i> <span>Laporan Bulanan</span></a></li>
        @endif
    </aside>
  </div>