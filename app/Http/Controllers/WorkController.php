<?php

namespace App\Http\Controllers;

use App\Models\WorkLog;
use App\Models\Reactor;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::paginate();
        return view('works.index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reactors = Reactor::all();
        return view('works.form', [  'reactors' => $reactors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $works =  Work::create($request->all());
        WorkLog::create([
            'work_id' => $works->id,
            'reactor_id' => $request->reactor_id,
            'action' => 'create',
        ]);
        return redirect()->route('works.index')->withSuccess('Created work ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        $reactor = Reactor::where('id', $work->reactor_id)->first();
        $logs = WorkLog::where('work_id', $work->id)->get();
        return view('works.show', ['work' => $work, 'reactor'=> $reactor, 'logs' => $logs ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $reactors = Reactor::all();
        return view('works.form', ['work' => $work,  'reactors' => $reactors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        if ($work->name == $request->name) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 're-name',
                'prev' => $work->name,
                'now' => $request->name,
            ]);
        }

        if ($work->reactor_id == $request->reactor_id) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 're-id',
                'prev' => $work->reactor_id,
                'now' => $request->reactor_id,
            ]);
        }
        if ($work->status == $request->status) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 'status',
                'prev' => $work->status,
                'now' => $request->status,
            ]);
        }
        if ($work->count == $request->count) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 'count',
                'prev' => $work->count,
                'now' => $request->count,
            ]);
        }
        if ($work->progress == $request->progress) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 'progress',
                'prev' => $work->progress,
                'now' => $request->progress,
            ]);
        }
        if ($work->start == $request->start) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 'start',
                'prev' => $work->start,
                'now' => $request->start,
            ]);
        }

        if ($work->finish == $request->finish) {
            WorkLog::create([
                'reactor_id' => $request->reactor_id,
                'work_id' => $work->id,
                'action' => 'finish',
                'prev' => $work->finish,
                'now' => $request->finish,
            ]);
        }

        $work->update($request->all());

        return redirect()->route('works.index')->withSuccess('Update work ' . $request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('works.index')->withDanger('Deleted reactor ' . $work->name);
    }
}
