<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = \App\Models\Booking::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'fecha_de_prestramo' => $this->faker->date(),
            'fecha_de_devolucion' => $this->faker->date(),
            'copy_id' => \App\Models\Copy::factory(),
        ];
    }
}
