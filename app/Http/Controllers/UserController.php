<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Work;
use App\Models\Reactor;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = new  User;
        return view('users.index', ['users' => $users->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'unique:users|email|required',
            'name'     => 'required',
            'password'     => 'required',
            'phone' => 'unique:users|required',
        ]);
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->phone = $request['phone'];
        $user->specialization = $request['specialization'];
        $user->password = Hash::make( $request['password']);
        $user->save();
        redirect(route('personal.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($persona)
    {
        $user = User::where('id', $persona)->first();
        $tasks= Task::where('user_id', $user->id)->join('works', 'tasks.work_id', '=', 'works.id')->get();
        $reactors =  Reactor::get();

        return view('users.show',  ['user' => $user, 'tasks' => $tasks,'reactors' =>  $reactors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($persona)
    {
        $user = User::where('id', $persona)->first();

        return view('users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function changepassform($persona){
        $user = User::where('id', $persona)->first();
        return view('users.changepassform', compact('user'));
    }
    public function changepass(Request $request, $persona){
        $this->validate($request, [
            'password'     => 'required',
        ]);
        $user = User::where('id', $persona)->first();
        $user->password = Hash::make( $request['password']);
        $user->save();
        return redirect()->route('personal.index')->withSuccess('Updated password ' . $user->name);
    }

    public function update(Request $request, $persona)
    {
        $user = User::where('id', $persona)->first();
        $user->update($request->all());
        return redirect()->route('personal.index')->withSuccess('Updated user ' . $user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($persona)
    {
        $user = User::where('id', $persona)->first();
        $user->delete();
        return redirect()->route('personal.index')->withDanger('Deleted user ' . $user->name);
    }
}
