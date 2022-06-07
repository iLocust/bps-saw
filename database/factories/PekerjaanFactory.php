<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use App\Models\SuratTugas;
use Illuminate\Database\Eloquent\Factories\Factory;

class PekerjaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pekerjaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->jobTitle(),
            'jenis' => $this->faker->randomElement(['easy', 'medium', 'hard']),
            'surat_tugas_id' => SuratTugas::inRandomOrder()->first()->id
        ];
    }
}
