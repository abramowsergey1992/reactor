@extends('layouts.main')

@section('content')
    <div class="h-100vh">
    <h1>{{$user->name}}</h1>
    <p>Роль: @switch($user->role)
                @case('administrator')
                    Админ
                    @break
                @case('itr')
                    ИТР
                    @break
                @case('workman')
                    Рабочий
                    @break
                @default
                @endswitch
            </p>
    <p>Профессия: {{$user->specialization}}</p>
    <hr>
    <p>Номер телефона: {{$user->phone}}</p>
    <p>Почта: {{$user->email}}</p>
    <p>{{$user->desc}}</p>

    <h2>Загруженность</h2>
            <script type="text/javascript">
var lngth ={{count($reactors)}};
var sidebarlist =[
   @for ($i = 0; $i < count($reactors); $i++)
         "<label>{{$reactors[$i]->name}}</label>"

     @if(count($reactors)-1!==$i)
     ,
     @endif
@endfor
  ];
</script>
        <div id="WorksTimeline">
                  <ul class="timeline-events">
                    @for ($i = 1; $i <= count($reactors); $i++)

                      @foreach ($tasks as $task)
                        @if ($task->reactor_id==$reactors[$i-1]->id)
                          <li data-timeline-node="{row: {{$i}}, start:'{{$task->date}}'  ,end:'{{\Carbon\Carbon::parse($task->date)->addDay()}}' ,bgColor:'#9acd32'}">
                           <span class="event-label"> <a href="{{route('works.show',$task->id)}}"></a> </span>
                             <span class="event-content"><p>Event Body...</p></span>
                          </li>
                        @endif

                      @endforeach


                    @endfor
                    </ul>
                </div>
    </div>
@endsection
