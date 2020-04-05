@extends('layouts.index')

@section('title')
    Добавить новость
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('Admin.addNews') }}">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="Header" class="form-control" name="Header">
                        @csrf
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Категория</label>
                        <select class="form-control" name="Category">
                            @foreach($category as $items)
                                <option value="{{ $items['id'] }}">{{ $items['category'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Введите текст новости:</label>
                        <textarea class="form-control" name="Content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
