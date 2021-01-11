@include('layout.header')
  <div class="nav-scroller py-1 mb-2">
    @include('layout.nav')
  </div>
</div>

<main role="main" class="container" id="app">
    <div class="row m-1">
        <example-component></example-component>
    </div>
    @include('layout.flash_message')
    <div class="row">

    <div class="col-md-8 blog-main">

        @yield('content')
        @yield('paginator')

    </div><!-- /.blog-main -->
    @section('sidebar')
        @include('layout.sidebar')
    @show
  </div><!-- /.row -->

</main><!-- /.container -->
    @include('layout.footer')
    <script src="{{ mix("/js/app.js") }}"></script>
    <script src="{{ mix("/js/manifest.js") }}"></script>
    <script src="{{ mix("/js/vendor.js") }}"></script>-->
</body>
</html>
