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
        \Illuminate\Support\Facades\DB::table('news')->insert($this->getContent());
    }

    private function getContent(): array
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10,15)),
                'text' => $faker->realText(rand(200,400)),
                'category_id' => (int)rand(1,2)
            ];
        }
        return $data;
    }
}
