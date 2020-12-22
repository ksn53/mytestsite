@extends('layout.layout')
@section('title', 'Добавить статью')
@section('content')
@include('layout.validationError')
    <form id="editDataForm" method="post" action="{{ route('posts.store') }}" class="mb-3">
    @csrf
        <div class="form-group">
            <label for="titleInput">Заголовок</label>
            <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название' value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="slugInput">Символьный код</label>
            <input name="slug" type="text" class="form-control" id="slugInput" placeholder='Введите код' value="{{ old('slug') }}">
        </div>
        <div class="form-check">
            <input name="published" type="checkbox" class="form-check-input" id="publishedInput">
            <label class="form-check-label" for="publishedInput">Опубликовано</label>
        </div>
        <div class="form-group">
            <label for="briefInput">Бриф</label>
            <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief') }}</textarea>
        </div>
        <div class="form-group">
            <label for="contentInput">Контент</label>
            <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="editButton">Добавить</button>
      </form>
@endsection
