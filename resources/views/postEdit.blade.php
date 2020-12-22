@extends('layout.layout')
@section('title', 'Изменить статью')
@section('content')
@include('layout.validationError')
    <form id="editDataForm" method="post" action="/posts/{{ $post->slug }}" class="mb-3">
    @csrf
    @method("PATCH")
        <div class="form-group">
            <label for="titleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название' value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="slugInput">Символьный код</label>
            <input name="slug" type="text" class="form-control" id="slugInput" placeholder='Введите код' value="{{ old('slug', $post->slug) }}">
        </div>
        <div class="form-check">
            <input name="published" type="checkbox" class="form-check-input" id="publishedInput" @if ($post->published == 1) checked="" @endif>
            <label class="form-check-label" for="publishedInput">Опубликовано</label>
        </div>
        <div class="form-group">
            <label for="briefInput">Бриф</label>
            <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief', $post->brief) }}</textarea>
        </div>
        <div class="form-group">
            <label for="contentInput">Контент</label>
            <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content', $post->content) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="editButton">Обновить</button>
      </form>
    <form id="deleteDataForm" method="post" action="/posts/{{ $post->slug }}" class="m-1">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-primary" id="deleteButton">Удалить</button>
    </form>
@endsection
