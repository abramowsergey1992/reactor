<?php

namespace App\Http\Controllers;

use App\Models\Reactor;
use Illuminate\Http\Request;
use App\Models\ReactorLog;

class ReactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reactors = Reactor::paginate();
        return view('reactors.index', compact('reactors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reactors.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reactor =  Reactor::create($request->all());
        ReactorLog::create([
            'reactor_id' => $reactor->id,
            'action' => 'create',
        ]);
        return redirect()->route('reactors.index')->withSuccess('Created reactor ' . $request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reactor  $reactor
     * @return \Illuminate\Http\Response
     */
    public function show(Reactor $reactor)
    {
        $logs = ReactorLog::where('reactor_id', $reactor->id)->get();
        return view('reactors.show', ['reactor'=> $reactor, 'logs' => $logs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reactor  $reactor
     * @return \Illuminate\Http\Response
     */
    public function edit(Reactor $reactor)
    {
        return view('reactors.form', compact('reactor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reactor  $reactor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reactor $reactor)
    {

        if($reactor->name== $request->name){
            ReactorLog::create([
                'reactor_id' => $reactor->id,
                'action' => 're-name',
                'prev' => $reactor->name,
                'now' => $request->name,
            ]);
        }
        if($reactor->type== $request->type){
            ReactorLog::create([
                'reactor_id' => $reactor->id,
                'action' => 'type',
                'prev' => $reactor->type,
                'now' => $request->type,
            ]);
        }
        if($reactor->status== $request->status){
            ReactorLog::create([
                'reactor_id' => $reactor->id,
                'action' => 'status',
                'prev' => $reactor->status,
                'now' => $request->status,
            ]);
        }
        if($reactor->countmodules== $request->countmodules){
            ReactorLog::create([
                'reactor_id' => $reactor->id,
                'action' => 'countmodules',
                'prev' => $reactor->countmodules,
                'now' => $request->countmodules,
            ]);
        }

        $reactor->update($request->all());

        return redirect()->route('reactors.index')->withSuccess('Update reactor ' . $request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reactor  $reactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reactor $reactor)
    {
        $reactor->delete();
        return redirect()->route('reactors.index')->withDanger('Deleted reactor ' . $reactor->name);
    }
}
