@extends('layouts.app')

@section('title')
    Админка
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($users as $user)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <h5 class="card-header">Изменение учётной записи</h5>
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <form method="POST" action="{{ route('admin.updateProfile', $user) }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Register.Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ $user->name }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Register.Email') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <input class="form-check-input" type="checkbox"
                                               @if($user->is_admin == 1) checked @endif id="is_admin" name="is_admin">
                                        <label class="form-check-label" for="gridCheck">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Изменить') }}
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
