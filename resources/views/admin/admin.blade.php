@include('layout.header')
<body>
<div class="container-fluid">
    @include('layout.flash_message')
    <div class="row">
        @include('admin.sidebar')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          @yield('maintitle')
      </div>
        @yield('content')
        @yield('paginator')
    </main>
    <script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>
