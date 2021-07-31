@extends('layouts.main')

@section('content')
    <div class="users h-100vh">
        <h1>Реакторы</h1>


        <div class="table-responsive">
            <table class="reactor-table" style="min-width:100%">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Статус</th>
                        <th>Модули </th>
                        <th>Начало работ </th>
                        <th>Окончание работ </th>


                    </tr>
                </thead>
                @forelse ($reactors as $reactor )
                    <tr class="reactor-tr">
                            <td>
                                <p class="mb-0"><a class="user-tr__name" href="{{route('reactors.show',$reactor)}}">{{$reactor->name}}</a></p>
                                <p class="mb-0"><a class="user-tr__article" href="{{route('reactors.show',$reactor)}}">{{$reactor->article}}</a></p>
                            </td>
                            <td>
                                {{$reactor->type}}
                            </td>
                            <td>
                                {{$reactor->status}}
                            </td>
                            <td>
                                {{$reactor->countmodules}}/{{$reactor->statusmodules}}
                            </td>
                            <td>
                                {{$reactor->start}}
                            </td>
                            <td>
                                {{$reactor->finish}}
                            </td>

                            <td style="width:109px;">
                                <a  href=" {{route('reactors.edit',$reactor)}} " class="btn btn-warning">Редактировать</a></td>
                            <td style="width:109px;">
                                <form action="{{route('reactors.destroy',$reactor)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>

                                </td>
                        </tr>
                @empty
                    <p>Реакторы не найденны. <a href="{{route('reactor.create')}}">Создать новый реактор</a></p>
                @endforelse

            </table>
        </div>
    </div>
@endsection
