@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список статей')
    @foreach ($posts as $post)
        <br>{{ $post->title }}
    @endforeach
@endsection
@section('paginator')

@endsection