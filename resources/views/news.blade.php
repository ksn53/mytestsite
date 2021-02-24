@extends('layout.layout')
@section('title', $news->title)
@section('content')
    @include('content.singlenews', ['news' => $news])
@endsection