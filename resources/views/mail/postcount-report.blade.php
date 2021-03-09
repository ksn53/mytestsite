@component('mail::message')
# тестовая тема

    Всего статей: {{ $postsCount }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
