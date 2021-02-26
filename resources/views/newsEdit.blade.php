@extends('layout.layout')
@section('title', 'Изменить новость')
@section('content')
@include('layout.validationError')
    <form id="editDataForm" method="post" action="{{ route("news.update", ['news' => $news->slug]) }}" class="mb-3">
    @csrf
    @method("PATCH")
        @include('newsForm', ['news' => $news])
        <button type="submit" class="btn btn-primary" id="editButton">Обновить</button>
      </form>
    <form id="deleteDataForm" method="post" action="{{ route("news.destroy", ['news' => $news->slug]) }}" class="m-1">
        @csrf
        @method("DELETE")
        <input type="hidden" name="editmode" value="1">
        <button type="submit" class="btn btn-primary" id="deleteButton">Удалить</button>
    </form>
@endsection
