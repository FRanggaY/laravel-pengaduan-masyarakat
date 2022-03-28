@extends('layouts.main')
@extends('layouts.dashboard-main')
@section('title', 'Users')

@section('header')
    @include('partials.navbar')
    @include('partials.sidebar')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Edit Pengguna</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ url('access/users/update/'.$user->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control"  value="{{ $user->name}}" name="name">
                  </div>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" value="{{ $user->username}}" name="username">
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
                    <input type="password" class="form-control" name="password">
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
                      <input type="number" class="form-control" value="{{ $user->telp}}" name="telp">
                    </div>
                </div>
                <div class="form-group">
                    <label>Akses</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                      <select type="text" class="form-control" name="level" placeholder="Akses">
                        <option value="{{ old('level'), $user->level}}" selected hidden>{{ $user->level }}</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit" >Update</button>
            </form>
        </div>
    </div>

</section>


@endsection
