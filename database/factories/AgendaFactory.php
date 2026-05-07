<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Akad Nikah', 'Resepsi', 'Unduh Mantu', 'Siraman']),
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i'),
            'end_time' => $this->faker->time('H:i'),
            'location' => $this->faker->company() . ' Hall',
            'address' => $this->faker->address(),
            'google_maps_url' => 'https://maps.app.goo.gl/' . $this->faker->slug(),
            'description' => $this->faker->sentence(),
            'is_active' => true,
        ];
    }
}
