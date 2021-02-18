
    <form id="editDataForm" method="post" action="{{ route('commentpage', ['post' => $post->slug]) }}" class="mb-3">
    @csrf
        <div class="form-group">
    <label for="titleInput">Заголовок</label>
    <input name="title" type="text" class="form-control" id="titleInput" placeholder='Введите название' value="{{ old('title') }}">
</div>

<div class="form-group">
    <label for="contentInput">Контент</label>
    <textarea name="content" class="form-control" id="contentInput" placeholder='Контент' rows="8">{{ old('content') }}</textarea>
</div>

        <button type="submit" class="btn btn-primary" id="editButton">Добавить</button>
      </form>

