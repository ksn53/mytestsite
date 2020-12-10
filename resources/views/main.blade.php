@extends('layout')
@section('content')
    @foreach ($posts as $post)
        @include('layout.briefpost', ['post' => $post])
    @endforeach
@endsection
