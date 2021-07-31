@extends('layouts.main')

@section('content')
<div class="h-100vh">
    <form method="POST" class="center-form"
      @if(isset($reactor))
            action="{{route('reactor.update',$reactor)}}"
            @else
            action="{{ route('reactor.store') }}"
            @endif
             >
              @isset($reactor)
            @method('PUT')
        @endisset
     @csrf
    <div class="card text-center ">
    <div class="card-header">
        <h4>
            @if(isset($reactor))
            Редактирование
             @else
             Новый реактор
             @endif
             </h4>
    </div>
    <div class="card-body">

        <div class="mb-3">
            <label for="article" class="form-label">{{__('Артикуль')}}</label>
            <input type="text" class="form-control @error('article') is-invalid  @enderror" name="article" id="article" value="{{old('article')}}" required autofocus>
            @error('article')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">{{__('Имя')}}</label>
            <input type="text" class="form-control @error('name') is-invalid  @enderror"name="name" id="name" value="{{old('name')}}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">{{__('Описание')}}</label>
            <textarea type="text" class="form-control @error('desc') is-invalid  @enderror"name="desc" id="desc" value="{{old('desc')}}" required autofocus>
            </textarea>
            @error('desc')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">{{__('Тип')}}</label>
            <select name="type" class="form-control @error('type') is-invalid  @enderror"  id="type" required>
                <option value="Модульный"
                 @if(isset($reactor))
                    @if($reactor->type=="Модульный")
                    selected="selected"
                    @endif
                 @endif>
                 Модульный</option>
                <option value="Дисковый"
                @if(isset($reactor))
                    @if($reactor->type=="Дисковый")
                    selected="selected"
                    @endif
                 @endif
                 >Дисковый</option>
            </select>
            @error('type')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">{{__('Статус')}}</label>
            <select name="status" class="form-control @error('status') is-invalid  @enderror"  id="status" required>
                <option value="Скрыт"
                 @if(isset($reactor))
                    @if($reactor->status=="Скрыт")
                    selected="selected"
                    @endif
                 @endif>
                 Скрыт</option>
                <option value="На паузе"
                 @if(isset($reactor))
                    @if($reactor->status=="На паузе")
                    selected="selected"
                    @endif
                 @endif>
                 На паузе</option>
                <option value="В работе"
                 @if(isset($reactor))
                    @if($reactor->status=="В работе")
                    selected="selected"
                    @endif
                 @endif>
                 В работе</option>
                <option value="Завершен"
                @if(isset($reactor))
                    @if($reactor->status=="Завершен")
                    selected="selected"
                    @endif
                 @endif
                 >Завершен</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="countmodules" class="form-label">{{__('Общее количество модулей/дисков')}}</label>
            <input type="number" class="form-control @error('countmodules') is-invalid  @enderror" name="countmodules"  id="countmodules" value="{{old('countmodules','20')}}" required >
            @error('countmodules')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="statusmodules" class="form-label">{{__('Готовые модули/диски')}}</label>
            <input type="number" class="form-control @error('statusmodules') is-invalid  @enderror" name="statusmodules"  id="statusmodules" value="{{old('statusmodules','0')}}" required >
            @error('statusmodules')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start"class="form-label">{{__('Дата начала работ')}}</label>
            <input type="text" class="form-control _air-date @error('start') is-invalid  @enderror"  name="start" id="start"   value="{{old('start')}}" required >
            @error('start')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="finish"class="form-label">{{__('Дата окончания работ')}}</label>
            <input type="text" class="form-control  _air-date  @error('finish') is-invalid  @enderror"  name="finish" id="finish"   value="{{old('finish')}}" required >
            @error('finish')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div>

    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary "type="submit">Создать</button>
    </div>


    </div>
</form>
</div>
@endsection
