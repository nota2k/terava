<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Trip;
use App\Models\User;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'start_date' => fake()->dateTimeThisYear(),
            'end_date' => fake()->dateTimeThisYear(),
            'location' => fake()->city(),
            'user_id' => User::factory(),
        ];
    }
}
