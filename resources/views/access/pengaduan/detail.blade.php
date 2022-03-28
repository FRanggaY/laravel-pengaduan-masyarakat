@extends('layouts.main')
@extends('layouts.dashboard-main')
@section('title', 'Detail')

@section('header')
    @include('partials.navbar')
    @include('partials.sidebar')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Detail Pengaduan : </h1>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label>Nama</label>
                    <p class="border p-2">{{ $pengaduan->masyarakat->nama }}</p>
                </div>
                <div class="form-group col-md-6 col-12">
                    <label>NIK</label>
                    <p class="border p-2">{{ $pengaduan->nik }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-7 col-12">
                    <label>Tanggal</label>
                    <p class="border p-2">{{ date('j F Y', strtotime($pengaduan->tgl_pengaduan)) }}</p>
                </div>
                <div class="form-group col-md-5 col-12">
                    <label>Telp</label>
                    <p class="border p-2">{{ $pengaduan->masyarakat->telp }}</p>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>Isi Laporan</label>
                    <div class="border p-2">
                        <img src="{{ asset($pengaduan->foto) }}" class="img-fluid" alt="">
                        {!! $pengaduan->isi_laporan  !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->level == 'petugas')
    <div class="section-header">
        <h1>Verifikasi dan Validasi : </h1>
    </div>

    <div class="card">
        <form class="needs-validation" method="POST" action="{{ url('access/pengaduan/update/'.$pengaduan->id_pengaduan) }}" novalidate="">
            @method('PUT')
            @csrf
          <div class="card-body">
              <div class="row">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric" name="status">
                        <option value="{{ old('status'), $pengaduan->status}}" selected hidden>{{ $pengaduan->status }}</option>
                        <option value="0">0</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                    </select>
                </div>
              </div>
          </div>
          <div class="card-footer text-center">
            <button class="btn btn-primary">Update</button>
          </div>
        </form>
    </div>
    @endif

</section>
@endsection
