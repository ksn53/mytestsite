@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список статей')
    <table class="table table-striped">
      <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>автор</th>
            <th>Создано</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="http://test.local/editpost/{{ $post->id }}">{{ $post->title }}</a></td>
            <td>{{ $post->owner_id }}</td>
            <td>{{ $post->created_at }}&nbsp;<a href="javascript://" onclick="deletePost({{ $post->id }})">Удалить</a></td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
@section('paginator')

@endsection