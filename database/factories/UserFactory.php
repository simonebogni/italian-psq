<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastName." ".$this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
            'role' => 'U',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'fiscal_code' => $this->faker->bothify('??????##?##?###?'),
            'birth_date' => $this->faker->dateTimeThisDecade,
            'phone_number' => $this->faker->phoneNumber,
        ];
    }
}
