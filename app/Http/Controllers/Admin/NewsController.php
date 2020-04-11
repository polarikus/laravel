<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function edit(News $news){
        return view('admin.addNews')->with([
            'news' => $news,
            'category' => Category::all()
        ]);
    }

    public function create(Request $request){
        $news = new News();
        if ($request->isMethod('post')) {
            $news->fill($request->all())->save();
                    redirect('create')->with('success', 'Новость успешно добавлена');
        }


        return view('admin.addNews')->with([
            'category' => Category::all(),
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news){
        $news->fill($request->all())->save();
        return redirect('admin')->with('success', 'Новость успешно изменена');
    }

    public function destroy(News $news){
        $news->delete();
        return redirect('admin')->with('success', 'Новость успешно Удалена!');
    }
}
