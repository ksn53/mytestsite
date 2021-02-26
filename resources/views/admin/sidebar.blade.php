<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
                <li class="nav-item">
          <a class="nav-link active" href="{{ route('adminpanel') }}">Главная</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.post.list') }}">Статьи</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.news.list') }}">Новости</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="{{ route('news.create') }}">Добавить новость</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.user.list') }}">Пользователи</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.role.list') }}">Роли</a>
      </li>
    </ul>
  </div>
</nav>