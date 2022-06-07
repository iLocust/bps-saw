<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use App\Models\SuratTugas;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuratTugasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SuratTugas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor' => $this->faker->bothify('#####-??????-####'),
            'pekerjaan_id' => Pekerjaan::inRandomOrder()->first()->id,
            'tgl_mulai' => $start = $this->faker->date(),
            'tgl_selesai' => $this->faker->dateTimeInInterval('+30 days')->format('Y-m-d'),
        ];
    }
}
