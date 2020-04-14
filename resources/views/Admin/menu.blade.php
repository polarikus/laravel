{{--}}
<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('Admin.addNews')?'active': '' }}" href="{{ route('Admin.addNews') }}">Добавить новость</a>
    </li>
</ul>мф
{{--}}
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Admin panel</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ route('Home') }}">Главная</a>
        <a class="p-2 text-dark" href="{{ route('admin.create') }}">Добавить новости</a>
        <a class="p-2 text-dark" href="{{ route('admin.') }}">Изменить Новости</a>
        {{--}}
        <a class="p-2 text-dark" href="{{ route('admin.export', 'news') }}">Экспорт новости</a>
        <a class="p-2 text-dark" href="{{ route('admin.export', 'category') }}">Экспорт категории</a>
        {{--}}
    </nav>
    {{--}}
    <a class="btn btn-outline-primary" href="{{ route('Login') }}">Войти</a>
    {{--}}
</div>
