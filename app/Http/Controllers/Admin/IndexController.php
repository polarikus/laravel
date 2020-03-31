<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function addNews(){
        return view('admin.addNews')->with('category', Category::getAllCategory());
    }
}
