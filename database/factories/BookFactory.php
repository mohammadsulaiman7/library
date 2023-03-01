<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ISBN' => $this->faker->isbn13(),
            'title' => $this->faker->company(),
            'price' => $this->faker->numberBetween(1000,10000),
            'mortgage' => $this->faker->numberBetween(1000, 100000),
            'category_id' => Category::get()->random()->id,
        ];
    }
}
