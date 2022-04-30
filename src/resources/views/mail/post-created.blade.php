@component('mail::message')
# Создана новая статья {{ $post->title }}

{{ $post->brief }}

@component('mail::button', ['url' => route("posts.show", ['post' => $post->slug])])
Смотреть статью
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
