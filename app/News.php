<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        1 => [
            'id' => 1,
            'main' => true,
            'title' => 'Политичненькая 1',
            'category' => 1,
            'text' => 'Кто-то что-то опять сделал, России это не понравилось'
        ],
        2 => [
            'id' => 2,
            'main' => true,
            'title' => 'Научненькая 1',
            'category' => 2,
            'text' => 'Кто-то что-то опять сделал и получил премию'
        ],
        3 => [
            'id' => 3,
            'main' => false,
            'title' => 'Политичненькая 2',
            'category' => 1,
            'text' => 'Новость про думму'
        ],
        4 => [
            'id' => 4,
            'main' => false,
            'title' => 'Научненькая 2',
            'category' => 2,
            'text' => 'Запустили новый линейный ускоритель'
        ]
    ];


    public static function getNews(){

            return static::$news;
    }

    public static function getNewsByCategory(string $category)
    {
        $categoryId = Category::getCategoryId($category);
        $arr = static::$news;
        $news = [];
        foreach ($arr as $item) {
            if ($item['category'] == $categoryId) {
                $news[$item['id']] = $item;
            }
        }
        return $news;
    }

    public static function getOneNews($id){
        $news = static::$news;
        return $news[$id];
    }



}
