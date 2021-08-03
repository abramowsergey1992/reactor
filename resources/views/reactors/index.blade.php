@extends('layouts.main')

@section('content')
    <div class="users h-100vh">
        <div class="row">
            <div class="col-md-6"><h1>Реакторы</h1></div>
            <div class="col-md-6" >                        <a class="btn btn-success" href="{{route('reactors.create')}}">Добавить реактор</a>
</div>
        </div>




        <div class="table-responsive">
            <table class="syle-table" style="min-width:100%">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Артикуль</th>
                        <th>Тип</th>
                        <th>Статус</th>
                        <th>Модули </th>
                        <th> </th>
                        <th> </th>


                    </tr>
                </thead>
                @forelse ($reactors as $reactor )
                    <tr class="syle-tr">
                            <td>
                                <p class="mb-0"><a class="user-tr__name" href="{{route('reactors.show',$reactor)}}">{{$reactor->name}}</a></p>
                            </td>
                            <td>
                                <p class="mb-0"><a class="user-tr__article" href="{{route('reactors.show',$reactor)}}">{{$reactor->article}}</a></p>
                            </td>
                            <td>
                                {{$reactor->type}}
                            </td>
                            <td>
                                {{$reactor->status}}
                            </td>
                            <td>
                                {{$reactor->countmodules}}
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
                    <p>Реакторы не найденны. <a href="{{route('reactors.create')}}">Создать новый реактор</a></p>
                @endforelse

            </table>
        </div>
    </div>
@endsection
