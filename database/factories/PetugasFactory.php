<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Petugas>
 */
class PetugasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>$this->faker->name(),
            'nip'=>$this->faker->numberBetween(),
            'alamat'=>$this->faker->address(),
            'jabatan'=>$this->faker->jobTitle()
        ];
    }
}
