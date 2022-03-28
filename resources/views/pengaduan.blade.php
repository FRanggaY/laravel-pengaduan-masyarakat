@extends('layouts.main')
@section('title', 'Pengaduan')


@section('login')
<section class="section">
    <div class="container mt-2">
        <div class="">
            <div class="login-brand gap-5">
            {{-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> --}}

                <a href="{{ url('/') }}"><span>Pengaduan Masyarakat</span></a>
                @if(!Auth::user())
                    <a href="{{ url('login') }}" class="btn btn-primary">Login</a>
                @else
                    <a href="{{ url('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @endif
            </div>

            <div class="card card-primary">
                @if (Session::get('failed'))
                <div class="btn btn-danger">
                    {{ Session::get('failed') }}
                </div>
                @endif
                @if (Session::get('success'))
                <div class="btn btn-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="card-header"><h4>Buat Pengaduan</h4></div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="needs-validation" action="{{ url('pengaduan') }}" novalidate="">
                        @csrf
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <label>Isi Laporan</label>
                                <input id="isi_laporan" type="hidden" name="isi_laporan" value="{{ old('isi_laporan') }}" required>
                                <trix-editor input="isi_laporan" ></trix-editor >
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <div><img id="img-preview" src="" alt="" class="img-fluid"></div>
                                <input type="file" id="image" name="foto" class="form-control" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])" required>
                            </div>
                            {{-- <div class="form-group">
                                <label>Nama</label>
                                <input type="name" name="nama" class="form-control" value="{{ old('name') }}" required>
                            </div> --}}
                            <div class="form-group">
                                <label>NIK</label>
                                <select type="number" class="form-control" value="{{ old('nik') }}" name="nik" required>
                                    @foreach ($masyarakat as $masyarakat)
                                        <option value="{{ $masyarakat->nik }}">{{ $masyarakat->nik }}</option> )
                                    @endforeach
                                </select>
                                {{-- <input type="number" name="nik" class="form-control" value="{{ old('nik') }}" required> --}}
                            </div>
                            {{-- <div class="form-group">
                                <label>Telp</label>
                                <input type="number" name="telp" class="form-control" value="{{ old('telp') }}" required>
                            </div> --}}
                            {{-- <div class="row form-group">
                                <div class="col-lg-6">
                                    <label>Username (Opsional)</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label>Password (Opsional)</label>
                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer pt-0">
                            <button class="btn btn-primary">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('trix-file-accept', function(e)){
        e.preventDefault();
    };

</script>
@endsection
