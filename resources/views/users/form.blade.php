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
            <input type="text" class="form-control @error('name') is-invalid  @enderror"name="name" id="name" value="@if (isset($user)) {{ $user->name }}@else{{ old('name') }} @endif " required autofocus>
            @error('name')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">{{__('Почта')}}</label>
            <input type="text" class="form-control @error('email') is-invalid  @enderror" name="email" id="email" value="@if (isset($user)) {{ $user->email }}@else{{ old('email') }} @endif " required >
            @error('email')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">{{__('Телефон')}}</label>
            <input type="text" class="form-control @error('phone') is-invalid  @enderror" name="phone"  id="phone" value="@if (isset($user)) {{ $user->phone }}@else{{ old('phone') }} @endif " required >
            @error('phone')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">{{__('Роль пользователя')}}</label>
            <select class="form-select" name="role"  id="role" >
                <option value="workman"
                @if (isset($user))
                        @if ($user->type=='workman')
                        selected="selected"
                        @endif
                    @endif>Рабочий</option>
                <option value="itr"
                @if (isset($user))
                        @if ($user->type=='itr')
                        selected="selected"
                        @endif
                    @endif>ИТР</option>
                <option value="administrator"
                @if (isset($user))
                        @if ($user->type=='administrator')
                        selected="selected"
                        @endif
                    @endif>Администратор</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="specialization" class="form-label">{{__('Специальность')}}</label>
            <select class="form-select" name="specialization"  id="specialization" >
                <option value="Без специальности"
                    @if (isset($user))
                        @if ($user->type=='Без специальности')
                        selected="selected"
                        @endif
                    @endif
                            >Без специальности</option>
                <option value="Сварщик"
                    @if (isset($user))
                        @if ($user->type=='Сварщик')
                        selected="selected"
                        @endif
                    @endif>Сварщик</option>
                <option value="Плотник"
                    @if (isset($user))
                        @if ($user->type=='Плотник')
                        selected="selected"
                        @endif
                    @endif>Плотник</option>
                <option value="Штукатур"
                    @if (isset($user))
                        @if ($user->type=='Штукатур')
                        selected="selected"
                        @endif
                    @endif>Штукатур</option>
                <option value="Каменьщик"
                    @if (isset($user))
                        @if ($user->type=='Каменьщик')
                        selected="selected"
                        @endif
                    @endif>Каменьщик</option>
                <option value="Маляр"
                    @if (isset($user))
                        @if ($user->type=='Маляр')
                        selected="selected"
                        @endif
                    @endif>Маляр</option>
            </select>
        </div>
        @if(!isset($user))
        <div class="mb-3">
            <label for="password"class="form-label">{{__('Пароль')}}</label>
            <input type="text" class="form-control @error('password') is-invalid  @enderror"  name="password" id="password" autocomplete="new-password"  value="@if (isset($user)) {{ $user->password }}@else{{ old('password') }} @endif " required >
            @error('password')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        @endif
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary "type="submit"> @if(isset($user))
            Сохранить
             @else
             Зарегистрировать
             @endif</button>
    </div>


    </div>
</form>
</div>
@endsection
