@extends('admin.admin')
@section('content')
    <form id="editDataForm" method="post" action="{{ route('admin.report.send') }}" class="mb-3">
    @csrf
        Выберите компоненты отчёта
        <div class="form-check">
            <input name="posts" type="checkbox" class="form-check-input" id='postscheckbox' {{ old('posts') ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Статьи</label>
        </div>
        <div class="form-check">
            <input name="news" type="checkbox" class="form-check-input" id='newscheckbox' {{ old('news') ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Новости</label>
        </div>
        <div class="form-check">
            <input name="comments" type="checkbox" class="form-check-input" id='commentscheckbox' {{ old('comments') ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Комментарии</label>
        </div>
        <div class="form-check">
            <input name="tags" type="checkbox" class="form-check-input" id='tagscheckbox' {{ old('tags') ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Теги</label>
        </div>
        <div class="form-check">
            <input name="users" type="checkbox" class="form-check-input" id='userscheckbox' {{ old('users') ? 'checked' : ''}}>
            <label class="form-check-label" for="exampleCheck1">Пользователи</label>
        </div>
        <button type="submit" class="btn btn-primary m-1">Submit</button>
    </form>
@endsection
@section('paginator')

@endsection