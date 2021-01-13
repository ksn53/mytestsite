    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link active" href="{{ route('adminpostlist') }}">Статьи</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('adminuserlist') }}">Пользователи</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('adminrolelist') }}">Роли</a>
          </li>
        </ul>
      </div>
    </nav>