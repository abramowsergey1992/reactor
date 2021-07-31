@extends('layouts.main')

@section('content')
    <div class="h-100vh">
        <form method="POST" class="center-form" @if (isset($work)) action="{{ route('works.update', $work) }}"
            @else
                    action="{{ route('works.store') }}" @endif>
            @isset($work)
                @method('PUT')
            @endisset
            @csrf
            <div class="card text-center ">
                <div class="card-header">
                    <h4>
                        @if (isset($work))
                            Редактирование
                        @else
                            Новая работа
                        @endif
                    </h4>
                </div>

                @if (isset($reactors))
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Имя') }}</label>
                            <input type="text" class="form-control @error('article') is-invalid  @enderror" name="name"
                                id="name" value="@if(isset($work)){{$work->name}}@else{{old('name')}} @endif " required autofocus>
                    @error('work')
                                <div class=" invalid-feedback">{!! $message !!}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="reactor_id" class="form-label">{{ __('Реактор') }}</label>
                        <select name="reactor_id"  class="form-control @error('reactor_id') is-invalid  @enderror" id="reactor_id"
                            required>
                            @foreach ($reactors as $reactor)
                                <option value="{{ $reactor->id }}" @if (isset($work))  @if ($reactor->id == $work->id) selected="selected" @endif  @endif>
                                    {{ $reactor->name }}</option>
                            @endforeach
                        </select>

                        @error('reactor_id')
                            <div class="invalid-feedback">{!! $message !!}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">{{ __('Описание') }}</label>
                        <textarea type="text" class="form-control @error('desc') is-invalid  @enderror" name="desc"
                            id="desc">@if (isset($reactor)){{ $reactor->desc }} @else{{ old('desc') }}@endif
                    </textarea>
                        @error('desc')
                            <div class="invalid-feedback">{!! $message !!}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">{{ __('Статус') }}</label>
                        <select name="status" class="form-control @error('status') is-invalid  @enderror" id="status"
                            required>
                            <option value="В ожидании" @if (isset($work))
                                @if ($work->status=='В ожидании')
                                selected="selected" @endif
                @endif>
                В ожидании</option>
                <option value="Активно" @if (isset($work))  @if ($work->status=='Активно')
                    selected="selected" @endif
                    @endif
                    >Активно</option>
                <option value="Завершенно" @if (isset($work))
                    @if ($work->status=='Завершенно')
                    selected="selected" @endif
                    @endif
                    >Завершенно</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{!! $message !!}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="count" class="form-label">{{ __('Количество модулей/дисков') }}</label>
                <input type="number" class="form-control @error('count') is-invalid  @enderror" name="count" id="count"
                    value="@if(isset($work)){{$work->count}}@else{{old('count')}}@endif" required>
                @error('count')
                    <div class="invalid-feedback">{!! $message !!}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="progress" class="form-label">{{ __('Количество готовых модулей/дисков') }}</label>
                <input type="number" class="form-control @error('progress') is-invalid  @enderror" name="progress"
                    id="progress" value="@if(isset($work)){{$work->progress }}@else{{old('progress')}}@endif" required>
                @error('progress')
                    <div class="invalid-feedback">{!! $message !!}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
            <label for="statusmodules" class="form-label">{{__('Готовые модули/диски')}}</label>
            <input type="number" class="form-control @error('statusmodules') is-invalid  @enderror" name="statusmodules"  id="statusmodules" value="{{old('statusmodules','0')}}" required >
            @error('statusmodules')
                <div class="invalid-feedback">{!! $message !!}</div>
            @enderror
        </div> --}}
            <div class="mb-3">
                <label for="start" class="form-label">{{ __('Дата начала работ') }}</label>
                <input type="text" class="form-control _air-date @error('start') is-invalid  @enderror" name="start"
                    id="start" value="@if (isset($work)) {{ $work->start->format('d.m.Y') }}@else{{ old('start') }} @endif" required>
                @error('start')
                    <div class="invalid-feedback">{!! $message !!}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="finish" class="form-label">{{ __('Дата окончания работ') }}</label>
                <input type="text" class="form-control  _air-date  @error('finish') is-invalid  @enderror" name="finish"
                    id="finish" value="@if (isset($work)) {{ $work->finish->format('d.m.Y') }}@else{{ old('finish') }} @endif" required>
                @error('finish')
                    <div class="invalid-feedback">{!! $message !!}</div>
                @enderror
            </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-primary " type="submit">
            @if (isset($work))
                Обновить
            @else
                Создать
            @endif
        </button>
    </div>


@else
    <p>Работа не может быть созданна без существующего реактора</p>
    <p>Необходимо <a href="{{ route('reactors.create') }}">создать реактор</a></p>
    @endif
    </div>
    </form>
    </div>

@endsection
