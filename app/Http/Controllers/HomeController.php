<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('main');
    }

    public function contacts(){
        return view('contacts');
    }
}
