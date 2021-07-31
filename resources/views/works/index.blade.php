@extends('layouts.main')

@section('content')
    <div class="users h-100vh">
        <h1>Работы</h1>
        @if(count($works)!=0)

        <div class="table-responsive">

            <table class="reactor-table" style="min-width:100%">
               @isset($works)
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Реактор</th>
                        <th>Статус</th>
                        <th>Прогерсс</th>
                        <th>Начало</th>
                        <th>Конец</th>

                    </tr>
                </thead>

                @endisset


                @foreach ($works as $work )
                    <tr class="works-tr">
                            <td>
                                <p class="mb-0"><a class="user-tr__name" href="{{route('works.show',$work)}}">{{$work->name}}</a></p>
                            </td>
                            <td>
                                <p class="mb-0"><a class="user-tr__article" href="{{route('works.show',$work->reactor_id)}}">{{$work->reactor_id}}</a></p>
                            </td>
                            <td>
                                {{$work->status}}
                            </td>
                            <td>
                                {{$work->count}}/{{$work->progress}}
                            </td>
                            <td>
                                {{$work->start->format('d.m.Y')}}
                            </td>
                            <td>
                                {{$work->finish->format('d.m.Y')}}
                            </td>


                            <td style="width:109px;">
                                <a  href=" {{route('works.edit',$work)}} " class="btn btn-warning">Редактировать</a></td>
                            <td style="width:109px;">
                                <form action="{{route('works.destroy',$work)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>

                                </td>
                        </tr>
                @endforeach


            </table>
        </div>
        @else
           <p>Работы не найденны. <a href="{{route('works.create')}}">Создать новую</a></p>
        @endif
    </div>
@endsection
