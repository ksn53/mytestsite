@extends('layout.layout')
@section('title', 'Главная страница')
@section('content')
    @foreach ($posts as $post)
        @include('content.briefpost', ['post' => $post])
    @endforeach
    <hr>
    <h2>News</h2>
    <hr>
    @foreach ($news as $newsItem)
        @include('content.briefnews', ['news' => $newsItem])
    @endforeach
@endsection
@section('paginator')

@endsection
