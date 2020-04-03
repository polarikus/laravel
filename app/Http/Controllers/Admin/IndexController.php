<?php

namespace App\Http\Controllers\Admin;

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

    public function addNews(Request $request)
    {
        if ($request->isMethod('post')) {
            $formData = $request->all();
            News::addNews($formData);
            //dd($arr);
            return view('news')->with([
                'news' => News::getNews(),
                'category' => Category::getAllCategory()
            ]);;
        }
        //dd($request->all());

        return view('admin.addNews')->with('category', Category::getAllCategory());
    }
}

