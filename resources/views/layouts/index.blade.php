<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@section('title')Страница | @show</title>
</head>
<body>
<script src="{{ asset('js/app.js') }}"></script>

<header>
    @yield('menu')
</header>
        <div class="mt-5 container">
            <div class="row">
                <div class="col-sm">
                </div>
                <div class="col-sm">
                    @yield('content')
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
</body>
</html>