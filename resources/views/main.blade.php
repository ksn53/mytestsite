@extends('layout')
@section('title', 'Главная страница')
@section('content')
    @foreach ($posts as $post)
        @include('content.briefpost', ['post' => $post])
    @endforeach
@endsection
