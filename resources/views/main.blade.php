@extends('layout.layout')
@section('title', 'Главная страница')
@section('content')
    @foreach ($posts as $post)
        @include('content.briefpost', ['post' => $post])
    @endforeach
@endsection
@section('paginator')
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>
@endsection
