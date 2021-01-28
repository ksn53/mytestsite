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
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('posts.edit', ['post' => $post->slug]) }}">{{ $post->title }}</a></td>
            <td>{{ $post->owner_id }}</td>
            <td>{{ $post->created_at }}</td>
            <td>
                <form id="deleteDataForm" method="post" action="{{ route("posts.destroy", ['post' => $post->slug]) }}">
                    @csrf
                    @method("DELETE")
                    <input type="hidden" name="adminmode" value="1">
                    <button type="submit" class="btn btn-link" id="deleteButton">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
@section('paginator')

@endsection