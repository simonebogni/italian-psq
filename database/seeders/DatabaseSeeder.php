<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(['role'=>'P'])->count(2)->create();
        \App\Models\User::factory(['user_id'=>1])->count(5)->create();
        \App\Models\User::factory(['user_id'=>2])->count(6)->create();



    }
}
