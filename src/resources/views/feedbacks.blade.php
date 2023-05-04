@extends('layout.layout')
@section('title', 'Отзывы')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>дата</th>
            <th>email</th>
            <th>сообщение</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
        <tr>
            <td>{{ $message->created_at }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
