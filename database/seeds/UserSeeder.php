<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Admin',
                'password' => Hash::make('1234'),
                'email' => 'admin@laravel.lc',
                'is_admin' => true
            ]
        ];
        DB::table('users')->insert($data);
    }
}
