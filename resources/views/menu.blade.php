<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="@if($menu == 'main') nav-link active @else nav-link @endif" href="{{ route('Home') }}">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('Admin') }}">Админка</a>
    </li>
    <li class="nav-item">
        <a class="@if($menu == 'contacts') nav-link active @else nav-link @endif" href="{{ route('Contacts') }}">Контакты</a>
    </li >
    <li class="nav-item">
        <a class="@if($menu == 'news') nav-link active @else nav-link @endif" href="{{ route('News') }}">Новости</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle @if($menu == 'category') active @endif" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Категории</a>
        <div class="dropdown-menu">
            @foreach(\App\Category::getAllCategory() as $item)
            <a class="dropdown-item" href="{{ route('NewsCategoryOne', $item['name']) }}">{{ $item['category'] }}</a>
            @endforeach
        </div>
    </li>
    <li class="nav-item">
        <a class="@if($menu == 'login') nav-link active @else nav-link @endif" href="{{ route('login') }}">Войти</a>
    </li >
</ul>
