<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('Admin.addNews')?'active': '' }}" href="{{ route('Admin.addNews') }}">Добавить новость</a>
    </li>
</ul>
