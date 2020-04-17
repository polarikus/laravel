@extends('layouts.app')

@section('title')
    Добавить новость
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="@if(!$news->id){{ route('admin.create') }}@else{{ route('admin.update', $news) }}@endif">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Заголовок</label>
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <input type="Header" class="form-control" name="title" value="{{ $news->title ?? old('title') }}">
                        @csrf
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Категория</label>
                        @if($errors->has('id_category'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('id_category') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <select class="form-control" name="id_category">
                            @foreach($category as $items)
                                <option @if($items->id == $news->id_category)selected @endif value="{{ $items->id }}">{{ $items->category }}</option>
                            @endforeach
                                <option value="3">Шляпа</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Введите текст новости:</label>
                        @if($errors->has('text'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('text') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <textarea class="form-control" name="text" rows="6">{{ $news->text ?? old('text') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">@if($news->id)Изменить @else Добавить @endif</button>
                </form>
            </div>
        </div>
    </div>
@endsection
