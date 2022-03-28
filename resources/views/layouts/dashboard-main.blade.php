@section('dashboard')
<div class="main-wrapper">


    @yield('header')

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>
    <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div>
        </div>
        <div class="footer-right">
            2.3.0
        </div>
    </footer>
</div>
@endsection
