<div class="form-group">
    <label for="titleInput">Заголовок</label>
    <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название' value="{{ old('title', $news->title) }}">
</div>
<div class="form-group">
    <label for="slugInput">Символьный код</label>
    <input name="slug" type="text" class="form-control" id="slugInput" placeholder='Введите код' value="{{ old('slug', $news->slug) }}">
</div>
<div class="form-check">
    <input name="published" type="checkbox" class="form-check-input" id="publishedInput" {{ $news->published ? 'checked' : ''}}>
    <label class="form-check-label" for="publishedInput">Опубликовано</label>
</div>
<div class="form-group">
    <label for="tagsInput">Теги</label>
    <input type="text" name="tags" class="form-control" id="tagsInput" value="{{ old('tags', $news->tags->pluck('name')->implode(',')) }}">
</div>
<div class="form-group">
    <label for="briefInput">Бриф</label>
    <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief', $news->brief) }}</textarea>
</div>
<div class="form-group">
    <label for="contentInput">Контент</label>
    <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content', $news->content) }}</textarea>
</div>
