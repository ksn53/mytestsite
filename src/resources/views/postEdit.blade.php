@extends('layout.layout')
@section('title', 'Изменить статью')
@section('content')
@include('layout.validationError')
    <form id="editDataForm" method="post" action="{{ route("posts.update", ['post' => $post->slug]) }}" class="mb-3">
    @csrf
    @method("PATCH")
        @include('postForm', ['post' => $post])
        <button type="submit" class="btn btn-primary" id="editButton">Обновить</button>
      </form>
    <form id="deleteDataForm" method="post" action="{{ route("posts.destroy", ['post' => $post->slug]) }}" class="m-1">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-primary" id="deleteButton">Удалить</button>
    </form>
@endsection
