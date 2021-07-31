@extends('layouts.main')

@section('content')
    <div class="h-100vh">
    <h1>{{$reactor->name}}</h1>
    <p>Артикуль: {{$reactor->article}}</p>
    <p>Тип: {{$reactor->type}}</p>
    <p>Количество модулей: {{$reactor->countmodules}}</p>
    <p>{{$reactor->desc}}</p>

    <h2>История событий</h2>
    <div class="history">
        @forelse ($logs as $log )
            @if ($log->action=="create")
                <p>{{$log->created_at->format('d.m.Y')}} -  Реактор создан</p>
            @endif
            @if ($log->action=="re-name")
                <p>{{$log->created_at->format('d.m.Y')}} -  Имя изменено с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="type")
                <p>{{$log->created_at->format('d.m.Y')}} - Тип изменен с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="status")
                <p>{{$log->created_at->format('d.m.Y')}} - Статус изменен с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
            @if ($log->action=="countmodules")
                <p>{{$log->created_at->format('d.m.Y')}} - Количество модулей изменен с "{{$log->prev}}" на "{{$log->now}}"</p>
            @endif
        @empty
            <p>Событий нет</p>
        @endforelse
    </div>
    </div>
@endsection
