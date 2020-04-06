<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Admin extends Model
{
    public static function exportNews()
    {
        return response()->json(News::getNews(), 200)
            ->header('Content-Disposition', 'attachment; filename="News.json"')
            ->setEncodingOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public static function exportCategories()
    {
        return response()->json(Category::getAllCategory(), 200)
            ->header('Content-Disposition', 'attachment; filename="Categories.json"')
            ->setEncodingOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
