<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

/*
#parameters: array:4 [▼
"Header" => "Тест"
      "_token" => "xaGJgduUmiUaRsqEt5FITbK3HRAphA5nFGnJFmLv"
      "Category" => "1"
      "content" => "Text"
    ]
*/

/*
{
        "id": 4,
        "main": true,
        "title": "Научненькая 2",
        "category": 2,
        "text": "Запустили новый линейный ускоритель"
    }
 */

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function newNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $formData = $request->all();
            $success = News::addNews($formData);
            //dd($arr);
            if ($success == true) {
                return redirect()->route('Admin.addNews')->with('success', 'Новость успешно добавлена!');
            } else {
                return redirect()->route('Admin.addNews')->with('error', 'Ошибка подключения к БД!');
            }
        }
        //dd($request->all());

        return view('admin.addNews')->with('category', Category::getAllCategory());
    }

    public function export($name)
    {
        if ($name == 'news') {
            return Admin::exportNews();
        } elseif ($name == 'category') {
            return Admin::exportCategories();
        } else {
            die('alert(\'Такого экспорта нет!\')');
        }
    }
}

