<?php

namespace Database\Factories;

use App\Models\Kriterias;
use App\Models\SuratTugas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KriteriasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kriterias::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'namaKriteria' => $this->faker->randomElement(['Kecepatan Pengumpulan', 'Kerapian Tulisan']),
            'sifat' => $this->faker->randomElement(['Cost', 'Benefit']),
        ];
    }
}
