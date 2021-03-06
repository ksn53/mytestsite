@extends('admin.admin')
@section('content')
    <h1>Панель администратора</h1><br>
    <h2>статистика сайта:</h2><br>
        <ul>
            <li>Общее количество статей: {{ $postcount }}</li>
            <li>Общее количество новостей: {{ $newscount }}</li>
            <li>ФИО автора, у которого больше всего статей на сайте: {{ $maxPostUser }}</li>
            <li>Самая длинная статья — название, ссылка на статью и длина статьи в символах: <a href="{{ route("posts.show", ['post' => $longestpost ->slug]) }}">{{ $longestpost->title}}</a> Его длина: {{ $longestPostContentLength }} символов.</li>
            <li>Самая короткая статья — название, ссылка на статью и длина статьи в символах: <a href="{{ route("posts.show", ['post' => $shortestPost ->slug]) }}">{{ $shortestPost->title}}</a> Его длина: {{ $shortestPostContentLength }} символов.</li>
            <li>Средние количество статей у активных пользователей (пользователь считается активным, если у него более 1 статьи): {{ $middlePostCount }}</li>
            <li>Самая непостоянная — название, ссылка на статью, которую меняли больше всего раз: <a href="{{ route("posts.show", ['post' => $mostEditedPost ->slug]) }}">{{ $mostEditedPost->title }}</a></li>
            <li>Самая обсуждаемая статья — название, ссылка на статью, у которой больше всего комментариев <a href="{{ route("posts.show", ['post' => $mostCommentedPost ->slug]) }}">{{ $mostCommentedPost->title }}</a></li>
        </ul>
@endsection
@section('paginator')

@endsection