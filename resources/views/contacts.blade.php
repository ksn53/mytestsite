@extends('layout')
@section('title', 'Контакты')
@section('content')
@include('layout.validationError')
<h1>Это форма обратной связи для контактов с нами</h1>
    <form id="editDataForm" method="post" action="/contacts" class="mb-3">
    @csrf
        <div class="form-group">
            <label for="inputEmail">email</label>
            <input name="email" type="email" class="form-control" id="inputEmail" placeholder='email'>
        </div>
        <div class="form-group">
            <label for="inputMessage">Сообщение</label>
            <textarea name="message" class="form-control" id="inputMessage" placeholder='сообщение' rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" id="editButton">Добавить</button>
      </form>
@endsection
