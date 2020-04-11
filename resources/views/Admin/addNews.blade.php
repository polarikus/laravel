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
                <form method="POST" action="@if(!$news->id){{ route('admin.create') }}@else{{ route('admin.update', $news) }}@endif">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        <input type="Header" class="form-control" name="title" value="{{ $news->title ?? old('title') }}">
                        @csrf
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Категория</label>
                        <select class="form-control" name="id_category">
                            @foreach($category as $items)
                                <option @if($items->id == $news->id_category)selected @endif value="{{ $items->id }}">{{ $items->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Введите текст новости:</label>
                        <textarea class="form-control" name="text" rows="6">{{ $news->text ?? old('text') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">@if($news->id)Изменить @else Добавить @endif</button>
                </form>
            </div>
        </div>
    </div>
@endsection
