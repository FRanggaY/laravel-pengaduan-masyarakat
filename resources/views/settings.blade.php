@extends('layouts.main')
@extends('layouts.dashboard-main')
@section('title', 'Dashboard')

@section('header')
    @include('partials.navbar')
    @include('partials.sidebar')
@endsection

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Settings</h1>
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
        <div class="card-body">
            <form method="POST" action="{{ url('change-password') }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                    </div>
                    <input type="password" class="form-control"  name="password">
                  </div>
                </div>
                <button class="btn btn-primary" type="submit" >Ubah Password</button>
            </form>
        </div>
    </div>

</section>
@endsection
