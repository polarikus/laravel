<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news')->with([
            'news' => News::getNews(),
            'category' => Category::getAllCategory()
        ]);
    }

    public function show($id)
    {
        return view('newsOne')->with('news', News::getOneNews($id));
    }

    public function category($name)
    {
        return view('categoryOne')->with([
            'categoryName' => $name,
            'news' => News::getNewsByCategory($name),
            'title' => Category::getCategoryRuName($name)
        ]);
    }

    public function categories()
    {
        return view('categories')->with('categories', Category::getAllCategory());
    }

}

