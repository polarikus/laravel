@extends('layouts.app')

@section('title')
    {{ $news->title }}
@endsection

@section('menu')
    @include('menu')
@endsection
@section('content')
<div class="container mt-5">
    <div class="col-md-8 justify-content-center">
        <div class="blog-post">
                <div class="blog-post-title">
                    <h4>{{ $news->title }}</h4>
                </div>
                <p class="lead">{{ $news->text }}</p>
        </div>
    </div>
</div>
@endsection

