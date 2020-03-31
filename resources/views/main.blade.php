@extends('layouts.index')

@section('title')
    @parent {{ $title }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<h1 class="text-center">Главная страница</h1>
@endsection

