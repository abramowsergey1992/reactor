@extends('layouts.main')

@section('content')
    <form method="POST" class="center-form" action="{{ route('login') }}">
        @csrf

        <div class="card ">
            <div class="card-header">
                <h4>Войти в систему</h4>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label for="phone" class="form-label">{{ __('Телефон') }}</label>
                    <input type="text" class="form-control @error('phone') is-invalid  @enderror" name="phone" id="phone"
                        value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{!! $message !!}</div>
                    @enderror
                </div>
                {{ session('status') }}

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Пароль') }}</label>
                    <input type="text" class="form-control @error('password') is-invalid  @enderror" name="password"
                        id="password" autocomplete="current-password" value="{{ old('password') }}" required>
                    @error('password')
                        <div class="invalid-feedback">{!! $message !!}</div>
                    @enderror
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="remember_me">
                                {{ __('Запомнить?') }}
                            </label>
                        </div>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="col-sm-6 text-sm-right">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                    @endif
                    <div>
                    </div>
                </div>
            </div>



            <button class="btn btn-primary " type="submit">Войти</button>

        </div>
    </form>

@endsection
