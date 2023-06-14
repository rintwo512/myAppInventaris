<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => $this->faker->randomDigit(),
            'assets' => $this->faker->company(),
            'wing' => $this->faker->sentence(mt_rand(1, 2)),
            'lantai' => mt_rand(1, 3),
            'ruangan' => $this->faker->company(),
            'merk' => $this->faker->company(),
            'type' => $this->faker->sentence(mt_rand(1, 2)),
            'jenis' => $this->faker->sentence(mt_rand(1, 2)),
            'kapasitas' => mt_rand(1, 5),
            'refrigerant' => 'R410',
            'product' => $this->faker->country(),
            'current' => mt_rand(1, 5),
            'voltage' => mt_rand(1, 8),
            'btu' => mt_rand(1, 8),
            'status' => 'Rusak',
            'catatan' => $this->faker->paragraphs(2, true),
            'petugas_pemasangan' => $this->faker->name(),
            'tgl_maintenance' => '1992-08-16 20:00:00'
        ];
    }
}
