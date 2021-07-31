<?php

namespace App\Http\Controllers;

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
        // ReactorLog::create([
        //     'reactor_id' => $reactor->id,
        //     'action' => 'create',
        // ]);
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
        $reactors = Reactor::all();
        // $logs = ReactorLog::where('reactor_id', $reactor->id)->get();
        return view('works.show', ['work' => $work, 'reactors' => $reactors ]);
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
        // if ($reactor->name == $request->name) {
        //     ReactorLog::create([
        //         'reactor_id' => $reactor->id,
        //         'action' => 're-name',
        //         'prev' => $reactor->name,
        //         'now' => $request->name,
        //     ]);
        // }
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
