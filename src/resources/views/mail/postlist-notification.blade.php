@component('mail::message')
# тестовая тема

    @foreach ($posts as $post)
        {{ $post->title }}<br>
    @endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
