<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{


    public static function getNews()
    {

        return  DB::table('news')->get();
    }

    public static function getNewsByCategory(string $category)
    {
        $categoryId = Category::getCategoryId($category);
        $arr = self::getNews();
        $news = [];
        foreach ($arr as $item) {
            if ($item->category_id == $categoryId) {
                $news[$item->id] = $item;
            }
        }
        return $news;
    }

    public static function getOneNews($id)
    {
        $news = self::getNews();
        return $news[$id];
    }

    public static function addNews($formData)
    {
        $arr = [
            'title' => $formData['Header'],
            'category_id' => $formData['Category'],
            'text' => $formData['Content']
        ];
        if (DB::table('news')->insert($arr)){
            return true;
        }else{
            return false;
        }
    }
    /*
        public static function getJson() {
            return response('{"error": "token incorrect"}', 401)->header('Content-type', 'application/json');
                ->json(static::getNews())->header('Status Code:', '403')->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        }
    */


}
