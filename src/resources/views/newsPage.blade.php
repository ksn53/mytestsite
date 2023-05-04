@extends('layout.layout')
@section('title', 'Главная страница')
@section('content')
    @foreach ($news as $newsItem)
        @include('content.briefnews', ['news' => $newsItem])
    @endforeach
@endsection
@section('paginator')
    {{ $news->links() }}
@endsection
