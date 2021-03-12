@extends('admin.admin')
@section('content')
    <form id="editDataForm" method="post" action="{{ route('admin.report.send') }}" class="mb-3">
    @csrf
        Выберите компоненты отчёта
        <div class="form-check">
            <input name="posts" type="checkbox" class="form-check-input" id="exampleCheck1" checked>
            <label class="form-check-label" for="exampleCheck1">Статьи</label>
        </div>
        <div class="form-check">
            <input name="news" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Новости</label>
        </div>
        <div class="form-check">
            <input name="comments" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Комментарии</label>
        </div>
        <div class="form-check">
            <input name="tags" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label \ class="form-check-label" for="exampleCheck1">Теги</label>
        </div>
        <div class="form-check">
            <input name="users" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Пользователи</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('paginator')

@endsection