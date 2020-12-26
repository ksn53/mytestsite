@include('layout.header')
  <div class="nav-scroller py-1 mb-2">
    @include('layout.nav')
  </div>
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

        @yield('content')
        @yield('paginator')

    </div><!-- /.blog-main -->
    @include('layout.sidebar')
  </div><!-- /.row -->

</main><!-- /.container -->
    @include('layout.footer')
</body>
</html>
