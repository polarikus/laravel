<?php

namespace App\Http\Controllers;

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
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('main')->with([
            'title' => 'Главная',
            'menu' => 'main'
        ]);
    }

    public function contacts(){
        return view('contacts')->with('menu', 'contacts');
    }

    public function login(){
        return view('auth.login')->with('menu', 'login');
    }
}
