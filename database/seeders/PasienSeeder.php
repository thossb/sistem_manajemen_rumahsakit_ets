<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
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
            ['pasien' => 'John Doe'],
            ['pasien' => 'Jane Smith'],
            ['pasien' => 'Briptu Ambarita'],
            // Add more data as needed
        ];

        // Insert the data into the "pasien" table
        DB::table('pasien')->insert($data);
    }
}
