@include('layout.header')
<div class="nav-scroller py-1 mb-2">
@include('layout.nav')
</div>

<div id="app">
    <example-component></example-component>
</div>

<main role="main" class="container">
    <div class="row m-1">

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
@include('layout.popupMessage')
</main><!-- /.container -->
    @include('layout.footer')
    <script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>
