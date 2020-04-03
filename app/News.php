<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{




public static function getNews(){

            return json_decode(Storage::disk('local')->get('data/news.json'), true);
    }

    public static function getNewsByCategory(string $category)
    {
        $categoryId = Category::getCategoryId($category);
        $arr = self::getNews();
        $news = [];
        foreach ($arr as $item) {
            if ($item['category'] == $categoryId) {
                $news[$item['id']] = $item;
            }
        }
        return $news;
    }

    public static function getOneNews($id){
        $news = self::getNews();
        return $news[$id];
    }

    public static function addNews ($formData){
        $arr = News::getNews();
        $arr[count(News::getNews()) + 1] = [
            'id' => count(News::getNews()) + 1,
            'main' => true,
            'title' => $formData['Header'],
            'category' => $formData['Category'],
            'text' => $formData['Content']
        ];
        Storage::disk('local')->put('data/news.json', json_encode($arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
/*
    public static function getJson() {
        return response('{"error": "token incorrect"}', 401)->header('Content-type', 'application/json');
            //->json(static::getNews())->header('Status Code:', '403')->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
*/


}
