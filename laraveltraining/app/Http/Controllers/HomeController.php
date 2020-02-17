<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $todos = Todo::all()->where('user_id', '=', $userId);
        return view('home', compact('todos'));
    }
}
