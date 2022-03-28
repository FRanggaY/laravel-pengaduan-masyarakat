@extends('layouts.main')
@extends('layouts.dashboard-main')
@section('title', 'Masyarakat')

@section('header')
    @include('partials.navbar')
    @include('partials.sidebar')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Masyarakat</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('access/masyarakats/update/'. $masyarakat->nik) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>NIK</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="number" class="form-control"  value="{{ $masyarakat->nik}}" name="nik">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control"  value="{{ $masyarakat->nama}}" name="nama">
                  </div>
                </div>
                {{-- <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" value="{{ $masyarakat->username}}" name="username">
                  </div>
                </div> --}}
                <div class="form-group">
                    <label>Telp</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" value="{{ $masyarakat->telp}}" name="telp">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" >Update</button>
            </form>
        </div>
    </div>

</section>


@endsection
