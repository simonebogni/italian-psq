<?php

namespace Database\Factories;

use App\Models\Survey;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Survey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sleep_snore_half' => $this->faker->boolean(),
            'sleep_snore_always' => $this->faker->boolean(),
            'sleep_snore_heavily' => $this->faker->boolean(),
            'sleep_breath_loudly' => $this->faker->boolean(),
            'sleep_breath_difficulty' => $this->faker->boolean(),
            'breath_mouth_open' => $this->faker->boolean(),
            'morning_dry_mouth' => $this->faker->boolean(),
            'sleep_breath_pause' => $this->faker->boolean(),
            'wet_bed' => $this->faker->boolean(),
            'wake_not_rested' => $this->faker->boolean(),
            'day_drowsiness' => $this->faker->boolean(),
            'teacher_drowsiness' => $this->faker->boolean(),
            'morning_wake_difficulty' => $this->faker->boolean(),
            'morning_headache' => $this->faker->boolean(),
            'stopped_growing' => $this->faker->boolean(),
            'overweight' => $this->faker->boolean(),
            'not_listening' => $this->faker->boolean(),
            'organising_tasks_difficulty' => $this->faker->boolean(),
            'easily_distracted' => $this->faker->boolean(),
            'agitate_when_sit' => $this->faker->boolean(),
            'hyperkinetic' => $this->faker->boolean(),
            'interrupts_others' => $this->faker->boolean()
        ];
    }
}
