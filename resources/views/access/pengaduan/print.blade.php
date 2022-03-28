<div class="container">
    <h4>Nama : {{ $pengaduan->masyarakat->nama }}</h4>
    <h4>NIK : {{ $pengaduan->nik }}</h4>
    <h4>Tanggal Pengaduan : {{ date('j F Y', strtotime($pengaduan->tgl_pengaduan)) }}</h4>
    <h4>Telp : {{ $pengaduan->masyarakat->telp }}</h4>
    @switch($pengaduan->status)
        @case('0')
            <div style="border: 2px solid red; background: red; color: white"> <h4 align="center">belum diproses</h4></div>
            @break
        @case('proses')
        <div style="border: 2px solid yellow; background: yellow; color: white"> <h4 align="center">diproses</h4></div>
            @break
        @case('selesai')
        <div style="border: 2px solid green; background: green; color: white"> <h4 align="center">selesai</h4></div>
            @break
        @default
            <td><div></div></td>
    @endswitch
    <hr>
    <h3 class="text-center">Isi Laporan</h3>
    <img src="{{ $pengaduan->foto }}" class="img-fluid" alt="" width="300">
    <div>
        {!! $pengaduan->isi_laporan  !!}
    </div>
</div>

