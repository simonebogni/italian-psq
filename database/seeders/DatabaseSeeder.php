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
        \App\Models\Survey::factory(['user_id'=>3])->count(3)->create();
        \App\Models\Survey::factory(['user_id'=>7])->count(1)->create();
        \App\Models\Survey::factory(['user_id'=>8])->count(2)->create();
    }
}
