@extends('layouts.main')

@section('content')
   <div class="h-">
        <h1>Приветствуем!!!</h1>
                    @auth
                        <p>Вы успешно прошли аунтентификацию</p>
                    @else
                        <p>Чтобы продожить Вы должны:
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Войти</a>
                       или
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Зарегистрироваться</a>
                        @endif</p>
                    @endauth
   </div>
@endsection
