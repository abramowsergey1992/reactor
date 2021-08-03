@extends('layouts.main')

@section('content')
<div class="h-100vh">
    <form method="POST" class="center-form"

            action="{{route('personal.changepass',$user)}}"

             >

     @csrf
    <div class="card text-center ">
    <div class="card-header">
        <h4>Смена пароля
             </h4>
    </div>
    <div class="card-body">
        <p>Изменить пароль для {{ $user->name }}</p>
        <hr>
         <div class="mb-3">
            <label for="password"class="form-label">{{__('Новый пароль')}}</label>
            <input type="text" class="form-control @error('password') is-invalid  @enderror"  name="password" id="password" autocomplete="new-password"  value="" required >
            @error('password')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary "type="submit">  Изменить пароль</button>
    </div>


    </div>
</form>
</div>
@endsection

