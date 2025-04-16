<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;
use App\Models\User;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'location' => fake()->word(),
            'interests' => fake()->word(),
            'bio' => fake()->word(),
            'profile_picture' => fake()->word(),
            'user_id' => User::factory(),
        ];
    }
}
