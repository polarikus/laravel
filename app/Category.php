<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{

    public static function getAllCategory()
    {
        return json_decode(Storage::disk('local')->get('data/categories.json'), true);
    }

    public static function getCategory($id)
    {
        $category = self::getAllCategory();
        return $category[$id]['name'];
    }

    public static function getCategoryId($name)
    {
        $category = self::getAllCategory();
        foreach ($category as $item) {
            if ($item['name'] == $name) {
                return $item['id'];
            }
        }
    }

    public static function getCategoryRuName($name)
    {
        foreach (self::getAllCategory() as $item) {
            if ($item['name'] == $name) {
                return $item['category'];
            }
        }
    }
}
