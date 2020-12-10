@extends('layout')
@section('content')
    @include('layout.singlepost', ['post' => $post])
@endsection