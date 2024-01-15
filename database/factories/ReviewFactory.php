<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Crear un usuario de prueba asociado
            'book_id' => Books::factory(), // Crear un libro de prueba asociado
            'review_text' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5)
        ];
    }
}
