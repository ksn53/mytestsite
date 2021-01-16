@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список пользователей')
    <table class="table table-striped">
      <thead>
        <tr>
            <th>ID</th>
            <th>имя</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
@section('paginator')

@endsection