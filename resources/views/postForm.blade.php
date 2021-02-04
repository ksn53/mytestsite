<div class="form-group">
    <label for="titleInput">Заголовок</label>
    <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название'
    @if (isset($post))
        value="{{ old('title', $post->title) }}"
    @else
        value="{{ old('title') }}"
    @endif
    >
</div>
<div class="form-group">
    <label for="slugInput">Символьный код</label>
    <input name="slug" type="text" class="form-control" id="slugInput" placeholder='Введите код'
    @if (isset($post))
        value="{{ old('slug', $post->slug) }}"
    @else
        value="{{ old('slug') }}"
    @endif
    >
</div>
<div class="form-check">
    <input name="published" type="checkbox" class="form-check-input" id="publishedInput"
    @isset($post)
        {{ $post->published ? 'checked' : ''}}
    @endisset
    >
    <label class="form-check-label" for="publishedInput">Опубликовано</label>
</div>
<div class="form-group">
    <label for="tagsInput">Теги</label>
    <input type="text" name="tags" class="form-control" id="tagsInput"
    @if (isset($post))
        value="{{ old('tags', $post->tags->pluck('name')->implode(',')) }}"
    @else
        value="{{ old('tags') }}"
    @endif
    >
</div>
<div class="form-group">
    <label for="briefInput">Бриф</label>
    @if (isset($post))
        <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief', $post->brief) }}</textarea>
    @else
        <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief') }}</textarea>
    @endif

</div>
<div class="form-group">
    <label for="contentInput">Контент</label>
    @if (isset($post))
        <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content', $post->content) }}</textarea>
    @else
        <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content') }}</textarea>
    @endif

</div>


