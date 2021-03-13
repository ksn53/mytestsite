@component('mail::message')
# тестовая тема
@if ($postsCount)
    Всего статей: {{ $postsCount }}
@endif

@if ($usersCount)
    Всего пользователей: {{ $usersCount }}
@endif

@if ($newsCount)
    Всего новостей: {{ $newsCount }}
@endif

@if ($tagsCount)
    Всего всего тегов: {{ $tagsCount }}
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
