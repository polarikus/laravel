<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('news')->insert([
            'title' => 'wadwada',
            'category_id' => (int)rand(1,2),
            'text' => 'awdnwahdhaiongslkiqeadgcuk'
        ]);
    }

    private function getData(): array {
        //$faker = Faker\Factory::create('ru_RU');

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => 'wadwada',
                'category_id' => (int)rand(1,2),
                'text' => 'awdnwahdhaiongslkiqeadgcuk'
            ];
        }

    }
}
