{{--}}
<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('Home')?'active': '' }}" href="{{ route('Home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Admin') }}">Админка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('Contacts')?'active': '' }}" href="{{ route('Contacts') }}">Контакты</a>
    </li >
    <li class="nav-item">
        <a class="nav-link" href="{{ route('News') }}">Новости</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Категории</a>
        <div class="dropdown-menu">
            @foreach(\App\Category::getAllCategory() as $item)
            <a class="dropdown-item" href="{{ route('NewsCategoryOne', $item['name']) }}">{{ $item['category'] }}</a>
            @endforeach
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Login') }}">Войти</a>
    </li >
</ul>
{{--}}
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel</h5>
    <ul class="nav">
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('Home') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('Admin') }}">Админка</a>
        </li>
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('Contacts') }}">Контакты</a>
        </li>
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('News') }}">Новости</a>
        </li>
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('Categories') }}">Категории</a>
        </li>
    </ul>
    <a class="btn btn-outline-primary" href="{{ route('Login') }}">Войти</a>
</div>
