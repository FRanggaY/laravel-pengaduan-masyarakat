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
      <h1>Masyarakat</h1>
    </div>

    <div class="card">
        <div class="card-body text-center">
          <p class="mb-2">Buat Data Profil Sekarang!</p>
          <button class="btn btn-primary" id="modal-5">Buat Data Profile</button>
        </div>
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

    <form class="modal-part" id="modal-login-part" method="POST" action="{{ url('access/masyarakats/add') }}">
        @csrf
        <div class="form-group">
          <label>NIK</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
            <input type="number" class="form-control" placeholder="NIK" name="nik">
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
            <input type="text" class="form-control" placeholder="Nama" name="nama">
          </div>
        </div>
        {{-- <div class="form-group">
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-lock"></i>
              </div>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password">
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
              <input type="number" class="form-control" placeholder="Telp" name="telp">
            </div>
        </div>
        <button class="btn btn-primary" type="submit" >Simpan</button>
    </form>


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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Telp</th>
                        {{-- <th>Username</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($masyarakat as $user)
                    <tr>
                        <td>{{ $user->nik }}</td>
                        <td>{{ $user->nama }}</td>
                        {{-- <td>{{ $user->username }}</td> --}}
                        <td>{{ $user->telp }}</td>
                        <td>
                            <a href="{{ url('access/masyarakats/edit/'.$user->nik) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('access/masyarakats/delete/'.$user->nik) }}" onclick="return confirm('Apakah yakin data akan di hapus?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
      </div>

</section>


@endsection

@section('script')
 <script>
     $(document).ready(function() {
    $('#example').DataTable();
} );

$("#modal-5").fireModal({
  title: 'Data Profile Personal',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: false,
//   onFormSubmit: function(modal, e, form) {
//     // Form Data
//     let form_data = $(e.target).serialize();

//     console.log(form_data)

//     // DO AJAX HERE
//     let fake_ajax = setTimeout(function() {
//     //   form.stopProgress();
//     //   modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

//     //   clearInterval(fake_ajax);
//         const href = window.location.href = "{{ url('access/users/add') }}";
//         href.post;


//     }, 1500);

//     e.preventDefault();
//   },
//   shown: function(modal, form) {
//     console.log(form)
//   },
//   buttons: [
//     {
//       text: 'Create',
//       submit: true,
//       class: 'btn btn-primary btn-shadow',
//       handler: function(modal) {
//       }
//     }
//   ]
});


 </script>
@endsection
