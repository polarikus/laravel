<style>
    p.card-text {
        white-space: nowrap; /* Запрещаем перенос строк */
        overflow: hidden; /* Обрезаем все, что не помещается в область */
        padding: 5px; /* Поля вокруг текста */
        text-overflow: ellipsis; /* Добавляем многоточие */
    }
</style>
@extends('layouts.index')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
    @foreach($news as $item)
        @php($id = $item->category_id)
<div class="col-md-6 mb-4">
    <div class="card">
        <h5 class="card-header">{{ $category[$id]['category'] }}</h5>
        <div class="card-body">
            <h5 class="card-title">{{$item->title}}</h5>
            <p class="card-text">{{ $item->text }}</p>
            <a href="{{route('NewsOne', $item->id)}}" class="btn btn-primary">Читать дальше</a>
        </div>
    </div>
</div>
    @endforeach
</div>
</div>
@endsection



