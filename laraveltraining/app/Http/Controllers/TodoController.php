<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newtodo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todo = new Todo();
        if($request->input('todoName')=="" || $request->input('todoDescription')==""){
            return redirect('/home');
        }
        $todo->name = $request->input('todoName');
        $todo->description = $request->input('todoDescription');
        if($request->input('todoPrivacity')=='Public'){
            $todo->public = true;
        }else{
            $todo->public = false;
        }
        $todo->user_id = auth()->user()->id;
        $todo->save();

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('pages.edittodo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $todo = todo::find($id);
        if(isset($todo)) {
            if($request->input('todoName')=="" || $request->input('todoDescription')==""){
                return redirect('/home');
            }
            $todo->name = $request->input('todoName');
            $todo->description = $request->input('todoDescription');
            if($request->input('todoPrivacity')=='Public'){
                $todo->public = true;
            }else{
                $todo->public = false;
            }
            $todo->save();
            return redirect('/home');
        } else {
            return redirect('/todos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if(isset($todo)) {
            $todo->concluded = true;
            $todo->save();
        }
        return redirect('/home');
    }
}
