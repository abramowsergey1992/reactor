@extends('layouts.main')

@section('content')
    <div class="h-100vh">
        <h1>Задачи: <a href="{{route('works.show',$work->id)}}">{{$work->name}}</a></h1>
        <script>


                itrs= [
                        @foreach ($itrs as $itr)
                            {
                                "id": {{$itr->id}},
                                "text": '{{$itr->name}}'
                            },
                        @endforeach
                    ]

                workmans = [
                        @foreach ($workmans as $workman)
                            {
                                "id": {{$workman->id}},
                                "text": '{{$workman->name}}',
                                "html":'{{$workman->type}}'
                            },
                        @endforeach
                    ]

                tasks= [
                    @foreach ($tasks as $task )
                        {
                            "date": '{{$task->date->format('d.m.Y')}}',
                            "role": '{{$task->role}}',
                            "user_id": '{{$task->user_id}}'
                        },
                    @endforeach
                ]
        </script>

        <div id="tasks" data-workid="{{$work->id}}">
            <div class="table-responsive">
                <table>
                    <thead>
                        @foreach ( $days as $day )
                        <th  class='task-collumn'>
                            {{$day}}
                            <span class="duplicate-next"  type="button"  data-bs-original-title="Дублировать работников <br> на все дни справа" data-bs-toggle="tooltip">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg>
                            </span>
                        </th>
                        @endforeach

                    </thead>
                    <tr>
                        @foreach ( $days as $day )
                        <td class="itr-td">
                            <div>
                            <select name="itr" data-day="{{$day}}" class="itr-select" >
                                <option></option>
                            </select>
                        </div>
                        </td>
                         @endforeach
                    </tr>
                    @for ($i=0 ;  $i < 15;  $i++)


                        <tr>
                            @foreach ( $days as $day )
                            <td class="workman-td">
                                <div>
                                <select name="workman" data-day="{{$day}}" class="workman-select" >
                                    <option></option>
                                </select>
                            </div>
                            </td>
                            @endforeach
                        </tr>
                    @endfor
                </table>
            </div>
            <button id="tasks-save" class="btn ml-2 mt-3 btn-primary" data-finish='{{$finish->format('d.m.Y')}}' data-start='{{$start->format('d.m.Y')}}' data-url="{{route('tasks.store')}}" >Сохранить</button>


        </div>
    </div>
@endsection
