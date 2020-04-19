{{--}}
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-5 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Laravel</h5>
    <ul class="nav">
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('Home') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="p-2 text-dark" href="{{ route('admin.') }}">Админка</a>
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
{{--}}

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Contacts') }}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('News') }}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('Categories') }}">Категории</a>
                </li>
                <!-- Authentication Links -->
                @auth()
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.') }}">Админка</a>
                        </li>
                        <a class="nav-link" href="{{ route('admin.create') }}">Добавить новости</a>
                        <a class="nav-link" href="{{ route('admin.') }}">Изменить Новости</a>
                    @endif
                @endauth
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register.Register') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login.Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Login.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @if(Auth::user()->is_admin)
                                <a class="dropdown-item" href="{{ route('admin.userShow') }}">Изменить профили пользователей</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('updateProfile') }}">Изменить профиль</a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
