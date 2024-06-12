<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anime>
 */
class AnimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image_url' => 'images/dummy-image-square.jpg',
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(15),
            'aired_date' => $this->faker->date('Y-m-d'),
            'is_ongoing' => $this->faker->boolean(),
            'episodes' => $this->faker->numberBetween(1, 500),
            'rating' => 0.00,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
