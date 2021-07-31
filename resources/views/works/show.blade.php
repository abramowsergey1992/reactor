@extends('layouts.main')

@section('content')
    <div class="h-100vh">
    <h1>{{$work->name}}</h1>
    <p>Статус: {{$work->status}}</p>
    <p>Реактор: <a href="{{route('reactors.show',$reactor->id)}}" >{{$reactor->name}}</a></p>
    <p>Прогресс: {{$work->count}}/{{$work->progress}}</p>
    <p>Начало работ: {{$work->start->format('d.m.Y')}} </p>
    <p>Конец работ: {{$work->finish->format('d.m.Y')}} </p>
    @isset($work->desc)
        <p>{{$work->desc}}</p>
    @endisset

    <h2>История событий</h2>
    <div class="history">
        @forelse ($logs as $log )
            @if ($log->action=="create")
                <p>{{$log->created_at->format('d.m.Y')}} -  Создание</p>
            @endif
            @if ($log->action=="re-name")
                <p>{{$log->created_at->format('d.m.Y')}} -  Имя изменено с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="re-id")
                <p>{{$log->created_at->format('d.m.Y')}} -  Смена реактора с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="status")
                <p>{{$log->created_at->format('d.m.Y')}} - Статус изменен с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="count")
                <p>{{$log->created_at->format('d.m.Y')}} - Количество модулей/дисков изменено с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="progress")
                <p>{{$log->created_at->format('d.m.Y')}} - Прогресс изменен с  "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="start")
                <p>{{$log->created_at->format('d.m.Y')}} - Дата начала работ измененна с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="finish")
                <p>{{$log->created_at->format('d.m.Y')}} - Дата конца работ измененна с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
        @empty
            <p>Событий нет</p>
        @endforelse
    </div>
    </div>
@endsection
