<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Pest\Laravel\fake;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all(); // Pobiera wszystkie rekordy z tabeli `posts`
        
        return [
            'name' => $this->faker->name(),
            'date' => $this->faker->dateTimeBetween('now', '+3 years')->format('Y-m-d'),
            'phone' => $this->faker->randomElement([5, 6, 7, 8]) . $this->faker->numerify('########'),
            'mail' => $this->faker->email(),
            'doctor' => $users->isNotEmpty() ? $this->faker->randomElement($users->pluck('name')->toArray()) : 'Brak lekarza',
        ];
    }
    
}
