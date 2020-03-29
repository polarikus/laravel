<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        return view('news')->with(['news' => News::getNews(), 'category' => News::getAllСategory()]);
    }

    public function show($id){
        return view('newsOne')->with('news', News::getOneNews($id));
    }

    public function category($name){
        return view('categoryOne')->with(['categoryName' => $name, 'news' => News::getNews($name)]);
    }
}
