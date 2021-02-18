<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Survey::factory(['user_id'=>3])->count(3)->create();
        \App\Models\Survey::factory(['user_id'=>7])->count(1)->create();
        \App\Models\Survey::factory(['user_id'=>8])->count(2)->create();


    }
}
