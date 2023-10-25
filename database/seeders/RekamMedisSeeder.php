<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RekamMedisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RekamMedis::factory(50)->create();
    }
}