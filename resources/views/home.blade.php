@extends('layouts.main')
@section('title', 'Home')


@section('login')
<section class="section">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                {{-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> --}}
                    <span>Pengaduan Masyarakat</span>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                  <div class="hero-inner">
                    <h2>Welcome!</h2>
                    <p class="lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur magnam soluta nihil itaque architecto sed, quasi eveniet commodi. Voluptatem, modi.</p>
                    <div class="mt-4">
                      <a href="{{ url('pengaduan') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Buat pengaduan</a>
                    </div>
                  </div>
                </div>
            </div>
            <h2 class="section-title">Article</h2>
            <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="assets/img/news/img13.jpg">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
                    <div class="article-title">
                      <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                    </div>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. </p>
                    <div class="article-user">
                      <img alt="image" src="assets/img/avatar/avatar-1.png">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#">Hasan Basri</a>
                        </div>
                        <div class="text-job">Web Developer</div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="assets/img/news/img14.jpg">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="#">News</a> <div class="bullet"></div> <a href="#">5 Days</a></div>
                    <div class="article-title">
                      <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                    </div>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. </p>
                    <div class="article-user">
                      <img alt="image" src="assets/img/avatar/avatar-3.png">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#">Rizal Fakhri</a>
                        </div>
                        <div class="text-job">UX Designer</div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
        </div>
    </div>
</section>
@endsection
