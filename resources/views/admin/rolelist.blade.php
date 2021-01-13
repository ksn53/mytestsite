@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список ролей')
    @foreach ($roles as $role)
        <br>{{ $role->name }}
    @endforeach
@endsection
@section('paginator')

@endsection