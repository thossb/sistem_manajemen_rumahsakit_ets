<?php

namespace Database\Factories;

use App\Models\RekamMedis;
use Illuminate\Database\Eloquent\Factories\Factory;

class RekamMedisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RekamMedis::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pasien' => $this->faker->randomElement(\App\Models\Pasien::pluck('id')->toArray()),
            'dokter' => $this->faker->randomElement(\App\Models\Dokter::pluck('id')->toArray()),
            'kondisi_kesehatan' => $this->faker->text(128),
            'suhu_tubuh' => $this->faker->randomFloat(2, 35, 45.5),
            'resep_file' => 'your_file_name_here.jpg',
        ];
    }
}
