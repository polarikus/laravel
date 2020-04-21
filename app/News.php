<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'text', 'id_category', 'link', 'guid', 'rss'];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category')->first();
    }

    public static function attributeNames(){
        return [
            'title' => "'Заголовок'",
            'id_category' => "'Категория'",
            'text' => "'Текст новости'"
        ];
    }

    public static function rules() {
        $tableCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:4|max:20',
            'id_category' => "required|exists:{$tableCategory},id",
            'text' => 'required|min:10|max:500'
        ];
    }
}
