@extends('layouts.index')

@section('title')
    @parent {{ $title }}
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            @foreach($news as $item)
                <li class="list-group-item"><a href="{{route('NewsOne', $item['id'])}}">{{$item['title']}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection

