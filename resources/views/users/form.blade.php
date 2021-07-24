@extends('layouts.main')

@section('content')
<div class="h-100vh">
    <form method="POST" class="center-form"
      @if(isset($user))
            action="{{route('personal.update',$user)}}"
            @else
            action="{{ route('personal.store') }}"
            @endif
             >
              @isset($user)
            @method('PUT')
        @endisset
     @csrf
    <div class="card text-center ">
    <div class="card-header">
        <h4>
            @if(isset($user))
            Редактирование
             @else
             Новый пользователь
             @endif
             </h4>
    </div>
    <div class="card-body">

        <div class="mb-3">
            <label for="name" class="form-label">{{__('Имя')}}</label>
            <input type="text" class="form-control @error('name') is-invalid  @enderror"name="name" id="name" value="{{old('name')}}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{__('Почта')}}</label>
            <input type="text" class="form-control @error('email') is-invalid  @enderror" name="email" id="email" value="{{old('email')}}" required >
            @error('email')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">{{__('Телефон')}}</label>
            <input type="text" class="form-control @error('phone') is-invalid  @enderror" name="phone"  id="phone" value="{{old('phone')}}" required >
            @error('phone')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">{{__('Роль пользователя')}}</label>
            <select class="form-select" name="role"  id="role" >
                <option value="workman">Рабочий</option>
                <option value="itr">ИТР</option>
                <option value="administrator">Администратор</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="specialization" class="form-label">{{__('Специальность')}}</label>
            <select class="form-select" name="specialization"  id="specialization" >
                <option value="none">Без специальности</option>
                <option value="svar">Сварщик</option>
                <option value="plot">Плотник</option>
                <option value="wall">Штукатур</option>
                <option value="stone">Каменьщик</option>
                <option value="malar">Маляр</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password"class="form-label">{{__('Пароль')}}</label>
            <input type="text" class="form-control @error('password') is-invalid  @enderror"  name="password" id="password" autocomplete="new-password"  value="{{old('password')}}" required >
            @error('password')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary "type="submit">Зарегистрировать</button>
    </div>


    </div>
</form>
</div>
@endsection
