<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        \App\Models\User::factory(['role'=>'P'])->count(2)->create();
        \App\Models\User::factory(['user_id'=>1])->count(5)->create();
        \App\Models\User::factory(['user_id'=>2])->count(6)->create();
        \App\Models\Survey::factory(['user_id'=>3])->count(3)->create();
        \App\Models\Survey::factory(['user_id'=>7])->count(1)->create();
        \App\Models\Survey::factory(['user_id'=>8])->count(2)->create();
        \App\Models\User::factory([
            'role'=>'A',
            'name' => 'Admin',
            'email'=>'',
            'email_verified_at'=>$now,
            'password' => '$2y$10$IyaLQoV8Nq8lAFUCUrWCTu85rJ7A7U2TdXH2tgK3l1CxiEvrqZxg.',
            'password_changed_at' => $now,
            'birth_date' => '2000-01-01 00:00:00',
            'fiscal_code' => 'ABCDEF12G34H567I',
            'phone_number' => '01234567890'
            ])->count(1)->create();

    }
}
