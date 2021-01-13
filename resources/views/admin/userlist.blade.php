@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список пользователей')
    @foreach ($users as $user)
        <br>{{ $user->name }}
    @endforeach
@endsection
@section('paginator')

@endsection