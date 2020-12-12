@extends('master.app')
@section('title', 'Form Laporan')


@section('main')

<div class="container mt-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
        <form class="needs-validation" novalidate="" action="{{route('laporanbulanan')}}" method="POST">
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
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pemasukan" value="" required>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pemasukan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_masuk" required></textarea>
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
                <input type="number" class="form-control @error('nama') is-invalid @enderror" autocomplete="off" name="pengeluaran" value="" required>
                @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label>Keterangan pengeluaran</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ket_keluar" required></textarea>
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

@endsection