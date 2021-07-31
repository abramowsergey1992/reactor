@extends('layouts.main')

@section('content')
    <div class="users h-100vh">
        <h1>Сотрудники</h1>
        <div class="users__filters">
            <div class="users__filter mb-3 mr-5">
                <div>
                <label>Фильтр по роли:</label></div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">ИТР</button>
                    <button type="button" class="btn btn-outline-secondary">Рабочий</button>
                    <button type="button" class="btn btn-outline-secondary">Администратор</button>
                </div>
            </div>
            <div class="users__filter mb-3 mr-5">
                <div><label>Фильтр по профессии:</label></div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Сварщик</button>
                    <button type="button" class="btn btn-outline-secondary">Рабочий</button>
                    <button type="button" class="btn btn-outline-secondary">Администратор</button>
                </div>
            </div>
            <div class="users__filter mb-3 mr-5">
                <div><label> &nbsp;</label></div>
                <a class="btn btn-success" href="{{route('personal.create')}}">Добавить сотрудника</a>
             </div>
        </div>

        <div class="table-responsive">
            <table class="users-table">
                @foreach ($users as $user )
                    <tr class="user-tr">
                            <td>
                                <p class="mb-0"><a class="user-tr__name" href="{{route('personal.show',['personal'=>$user->id])}}">{{$user->name}}</a></p>
                                <p class="mb-0"><a class="user-tr__phone" href="tel:{{$user->phone}}">{{$user->phone}}</a></p>
                            </td>
                            <td>
                                {{$user->role}}
                            </td>
                            <td>
                                {{$user->specialization}}
                            </td>
                            <td style="width:109px;">
                                <a  href=" {{route('personal.edit',['personal'=>$user->id])}} " class="btn btn-warning">Редактировать</a></td>
                            <td style="width:109px;">
                                <form action="{{route('personal.destroy',['personal'=>$user->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>

                                </td>
                        </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
