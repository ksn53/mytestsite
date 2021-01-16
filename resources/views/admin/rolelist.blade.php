@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список ролей')
    <table class="table table-striped">
      <thead>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>код</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td><a href="http://test.local/editpost/{{ $role->id }}">{{ $role->name }}</a></td>
            <td>{{ $role->slug }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
@section('paginator')

@endsection