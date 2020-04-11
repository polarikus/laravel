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
                'name' => 'since'
            ]
        ];
        DB::table('categories')->insert($data);
    }
}
