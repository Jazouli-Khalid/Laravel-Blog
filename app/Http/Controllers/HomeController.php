<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;

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
        $userId = Auth::id();
        $user = User::find($userId);
        $posts = $user ->posts;

        return view('home', compact('posts'));
    }
}
