<?php

namespace App;

use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'category_id', 'text', 'id_category'];

    public function category(){
        return $this->belongsTo(Category::class, 'id_category')->first();
    }
}
