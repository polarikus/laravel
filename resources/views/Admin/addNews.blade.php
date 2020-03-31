@extends('layouts.index')

@section('title')
    Добавить новость
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Заголовок</label>
            <input type="Header" class="form-control" id="Header">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select class="form-control" id="exampleFormControlSelect1">
                @foreach($category as $items)
                    <option value="{{ $items['id'] }}">{{ $items['category'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Введите текст новости:</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Добавить</button>
    </form>
@endsection
