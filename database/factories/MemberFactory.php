<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
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
            'email'=>$this->faker->unique()->email(),
            'alamat'=>$this->faker->address(),
            'no_telp'=>'+62' . $this->faker->numerify('###########'),
        ];
    }
}
