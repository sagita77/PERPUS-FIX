<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(3),   // Random book title with 5 words
            'penulis' => $this->faker->name(),      // Random author name
            'tahun_terbit' => $this->faker->year(), // Random year of publication
            'stok' => $this->faker->numberBetween(1, 10),
            "kategori_id"=>Kategori::factory()
        ];
    }
}
