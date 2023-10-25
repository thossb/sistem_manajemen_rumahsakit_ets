<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data you want to seed
        $data = [
            ['dokter' => 'Dr. John Smith'],
            ['dokter' => 'Dr. Jane Doe'],
            // Add more data as needed
        ];

        // Insert the data into the "dokter" table
        DB::table('dokter')->insert($data);
    }
}
