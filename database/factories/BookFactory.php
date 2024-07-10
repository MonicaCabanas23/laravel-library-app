<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'ubicacion' => $this->faker->sentence(),
            'cantidad_de_ejemplares' => $this->faker->numberBetween(1, 100),
            'author_id' => \App\Models\Author::factory(),
        ];
    }
}
