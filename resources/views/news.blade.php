@extends('layouts.index')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
                <div class="container">
                    <div class="row justify-content-center">
                            @foreach($news as $item)
                                @php($id = $item['category'])
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <h5 class="card-header">{{ $category[$id]['category'] }}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">{{$item['title']}}</h5>
                                    <p class="card-text">{{$item['text']}}...</p>
                                    <a href="{{route('NewsOne', $item['id'])}}" class="btn btn-primary">Читать дальше</a>
                                </div>
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
@endsection



