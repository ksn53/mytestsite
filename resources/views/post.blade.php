@extends('layout')
@section('title', $post->title)
@section('content')
    @include('content.singlepost', ['post' => $post])
@endsection