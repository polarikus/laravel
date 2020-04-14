<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //DB::table('news')->insert($this->getContent());
        factory(News::class, 50)->create();
    }

    private function getContent(): array
    {
        $faker = Faker\Factory::create();
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10,15)),
                'text' => $faker->realText(rand(200,400)),
                'id_category' => (int)rand(1,2)
            ];
        }
        return $data;
    }
}


