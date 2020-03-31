@extends('layouts.index')

@section('title')
    {{ $news['title'] }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h1>{{ $news['title'] }}</h1>
    <p>{{ $news['text'] }}</p>
@endsection


