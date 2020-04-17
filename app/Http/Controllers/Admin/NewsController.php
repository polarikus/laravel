<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //Обработчик ошибок
    private function success($result, string $messSucces) {
        if ($result){
            return ['success' => $messSucces];
        }else{
            return ['error' => 'Ошибка подключения к БД'];
        }
    }
    public function edit(News $news){
        return view('admin.addNews')->with([
            'news' => $news,
            'category' => Category::all()
        ]);
    }

    public function create(Request $request){
        $news = new News();
        if ($request->isMethod('post')) {
            //Сохранение в БД:
            //Редирект с сообщением об успешно добавленной новости
            $this->validate($request, News::rules(), [], News::attributeNames());
            redirect('create')->with($this->success($news->fill($request->all())->save(), 'Новость успешно добавлена!'));
        }


        return view('admin.addNews')->with([
            'category' => Category::all(),
            'news' => $news
        ]);
    }

    public function update(Request $request, News $news){
        $this->validate($request, News::rules(), [], News::attributeNames());
        return redirect('admin')->with($this->success($news->fill($request->all())->save(), 'Новость успешно изменена!'));
    }

    public function destroy(News $news){
        return redirect('admin')->with($this->success($news->delete(), 'Новость успешно Удалена!'));
    }
}
