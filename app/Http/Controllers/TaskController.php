<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tasks = Task::where('work_id', (int)$request['work_id'])->delete();
        $text = '';


        foreach ($request['data'] as $t) {
            $text= $text. Task::where('work_id', $request['work_id'])
                ->where('user_id', (int)$t['user_id'])
                ->whereDate('date', Carbon::createFromFormat('d.m.Y', $t['date']))
                ->count();
            if (
                Task::where('work_id', $request['work_id'])
                ->where('user_id', (int)$t['user_id'])
                ->whereDate('date', Carbon::createFromFormat('d.m.Y', $t['date']))
                ->count()==0
            ){
                Task::create([
                    'work_id' => (int)$request['work_id'],
                    'user_id' => $t['user_id'],
                    'date' => Carbon::createFromFormat('d.m.Y', $t['date'])
                ]);
            }else{
                Task::where('work_id', (int)$request['work_id'])
                ->where('user_id', $t['user_id'])
                ->where('date', $t['date'])
                ->update([
                    'work_id' => (int)$request['work_id'],
                    'user_id' => $t['user_id'],
                    'date' => Carbon::createFromFormat('d.m.Y', $t['date'])
                ]);
            }

        }


        return response()->json($text  , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
