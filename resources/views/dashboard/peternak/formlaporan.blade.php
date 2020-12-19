@extends('master.app')
@section('title', 'Form Laporan')


@section('main')

<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <form class="needs-validation" novalidate="" action="{{route('laporanbulanan')}}" method="POST">
=======
        <form action="{{route('storeform')}}" method="POST" enctype="multipart/form-data">
>>>>>>> Stashed changes
=======
        <form action="" method="POST" enctype="multipart/form-data">
>>>>>>> Stashed changes
          @csrf
            <div class="card-header">
              <h4>Form Laporan</h4>
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" required>
=======
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" >
>>>>>>> Stashed changes
=======
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" >
>>>>>>> Stashed changes
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pemasukan</label>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" required></textarea>
=======
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" ></textarea>
>>>>>>> Stashed changes
=======
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" ></textarea>
>>>>>>> Stashed changes
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Foto bukti pemasukan</label>
                <input type="file" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="ftbkt_in" value="">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Nominal Pengeluaran</label>
                <p>(penggunaan uang investasi)</p>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" required>
=======
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" >
>>>>>>> Stashed changes
=======
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" >
>>>>>>> Stashed changes
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pengeluaran</label>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" required></textarea>
=======
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" ></textarea>
>>>>>>> Stashed changes
=======
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" ></textarea>
>>>>>>> Stashed changes
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Foto bukti pengeluaran</label>
                <input type="file" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="ftbkt_out" value="">
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
@endsection
=======
@endsection
//form laporan
>>>>>>> Stashed changes
=======
@endsection
>>>>>>> Stashed changes
=======
@endsection
>>>>>>> Stashed changes
