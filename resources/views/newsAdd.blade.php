@extends('layout.layout')
@section('title', 'Добавить статью')
@section('content')
@include('layout.validationError')
    <form id="editDataForm" method="post" action="{{ route('news.store') }}" class="mb-3">
    @csrf
        @include('newsForm', ['news' => new App\Models\News()])
        <button type="submit" class="btn btn-primary" id="editButton">Добавить</button>
      </form>
@endsection
