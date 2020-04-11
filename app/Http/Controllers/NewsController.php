<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(6);
        return view('news')->with([
            'news' => $news,
            'category' => Category::all()->keyBy('id')
        ]);
    }

    public function show(News $news)
    {
        return view('newsOne')->with('news', $news);
    }

    public function category($name)
    {
        $category = Category::query()
            ->select('id', 'category')
            ->where('name', $name)
            ->get();
        $news = News::query()->where('id_category', $category[0]->id)->paginate(4);
        return view('categoryOne')->with([
            'categoryName' => $name,
            'news' => $news,
            'title' => $category[0]->category
        ]);
    }

    public function categories()
    {
        return view('categories')->with('categories', Category::all());
    }

}

