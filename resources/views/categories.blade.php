@extends('layouts.app')

@section('title')
    Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($categories as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$item['category']}}</h5>
                            <a href="{{ route('NewsCategoryOne', $item['name']) }}" class="btn btn-primary">Читать</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
