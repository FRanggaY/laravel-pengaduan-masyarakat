@extends('layouts.main')
@extends('layouts.dashboard-main')
@section('title', 'Pengaduan')

@section('header')
    @include('partials.navbar')
    @include('partials.sidebar')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengaduan</h1>
    </div>

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

    <div class="card">
        <div class="card-header">
          <h4>Tabel</h4>
          {{-- <div class="card-header-action">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div> --}}
        </div>
        <div class="card-body p-4">
          <div class="table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $pengaduan)
                    <tr>
                        <td>{{ $pengaduan->masyarakat->nama }}</td>
                        <td>{{ $pengaduan->nik }}</td>
                        <td>{{ $pengaduan->tgl_pengaduan }}</td>

                        @switch($pengaduan->status)
                            @case('0')
                                <td><div class="badge badge-warning">belum diproses</div></td>
                                @break
                            @case('proses')
                                <td><div class="badge badge-info">proses</div></td>
                                @break
                            @case('selesai')
                                <td><div class="badge badge-success">selesai</div></td>
                                @break
                            @default
                                <td><div></div></td>
                        @endswitch

                        <td>
                            <a href="{{ url('access/pengaduan/'. $pengaduan->id_pengaduan) }}" class="btn btn-primary">Lihat</a>
                            @if(Auth::user()->level == 'admin')
                            <a href="{{ url('access/pengaduan/print/'. $pengaduan->id_pengaduan) }}" target="_blank" class="btn btn-warning">Cetak</a>
                            @endif
                            <a href="{{ url('access/pengaduan/delete/'.$pengaduan->id_pengaduan) }}" onclick="return confirm('Apakah yakin data akan di hapus?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        <div>
</section>
@endsection
@section('script')
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
