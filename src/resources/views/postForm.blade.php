<div class="form-group">
    <label for="titleInput">Заголовок</label>
    <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название' value="{{ old('title', $post->title) }}">
</div>
<div class="form-group">
    <label for="categoryInput">Категория</label>
    <input name="category" type="text" class="form-control" id="categoryInput" placeholder='Введите рубрику' value="{{ old('category', $post->category->name) }}">
</div>
<div class="form-group">
    <label for="slugInput">Символьный код</label>
    <input name="slug" type="text" class="form-control" id="slugInput" placeholder='Введите код' value="{{ old('slug', $post->slug) }}">
</div>
<div class="form-check">
    <input name="published" type="checkbox" class="form-check-input" id="publishedInput" {{ $post->published ? 'checked' : ''}}>
    <label class="form-check-label" for="publishedInput">Опубликовано</label>
</div>
<div class="form-group">
    <label for="tagsInput">Теги</label>
    <input type="text" name="tags" class="form-control" id="tagsInput" value="{{ old('tags', $post->tags->pluck('name')->implode(',')) }}">
</div>
<div class="form-group">
    <label for="briefInput">Бриф</label>
    <textarea name="brief" class="form-control" id="briefInput" placeholder='Бриф' rows="3">{{ old('brief', $post->brief) }}</textarea>
</div>
<div class="form-group">
    <label for="contentInput">Контент</label>
    <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content', $post->content) }}</textarea>
</div>
