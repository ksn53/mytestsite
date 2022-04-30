@extends('layout.layout')
@section('title', $post->title)
@section('content')
    @include('content.singlepost', ['post' => $post])
@endsection