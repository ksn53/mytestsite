@extends('admin.admin')
@section('content')
    @section('maintitle', 'Список новостей')
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
    @foreach ($news as $newsItem)
        <tr>
            <td>{{ $newsItem->id }}</td>
            <td><a href="{{ route('news.edit', ['news' => $newsItem->slug]) }}">{{ $newsItem->title }}</a></td>
            <td>{{ $newsItem->owner->name }}</td>
            <td>{{ $newsItem->created_at }}</td>
            <td>
                <form id="deleteDataForm" method="post" action="{{ route("news.destroy", ['news' => $newsItem->slug]) }}">
                    @csrf
                    @method("DELETE")
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