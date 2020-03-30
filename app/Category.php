<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category = [
        1 => [
            'id' => 1,
            'category' => 'Политика',
            'name' => 'politics'
        ],
        2 => [
            'id' => 2,
            'category' => 'Наука',
            'name' => 'since'
        ]
    ];

    public static function getAllCategory(){
        return static::$category;
    }

    public static function getCategory($id){
        $category = static::$category;
        return $category[$id]['name'];
    }

    public static function getCategoryId($name){
        $category = static::$category;
        foreach ($category as $item){
            if ($item['name'] == $name){
                return $item['id'];
            }
        }
    }
}
