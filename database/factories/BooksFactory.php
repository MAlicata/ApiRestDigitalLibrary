<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
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
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'publication_year' => $this->faker->year,
            'pages' => $this->faker->numberBetween(1,10000),
        ];
    }
}
