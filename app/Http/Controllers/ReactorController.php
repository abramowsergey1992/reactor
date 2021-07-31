<?php

namespace App\Http\Controllers;

use App\Models\Reactor;
use Illuminate\Http\Request;

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
        Reactor::create($request->all());
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
        return view('reactors.show', compact('user'));
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
        Reactor::udate($request->all());
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
