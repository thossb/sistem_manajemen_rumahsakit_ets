<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pasien');
            $table->foreign('pasien')->references('id')->on('pasien');

            $table->unsignedBigInteger('dokter');
            $table->foreign('dokter')->references('id')->on('dokter');

            $table->string('kondisi_kesehatan', 128);
            $table->decimal('suhu_tubuh', 5, 2); // Angka dan presisi suhu tubuh
            $table->string('resep_file'); // Store the image file name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
