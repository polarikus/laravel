<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'category' => 'Политика',
                'name' => 'politics'
            ],
            [
                'category' => 'Наука',
                'name' => 'tech'
            ],
            [
                'category' => 'Фото',
                'name' => 'photo'
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
