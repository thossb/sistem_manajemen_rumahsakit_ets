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
        Schema::create('daftar_barang', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('jenis_barang');
            $table->foreign('jenis_barang')->references('id')->on('jenis_barang');

            $table->unsignedBigInteger('kondisi_barang');
            $table->foreign('kondisi_barang')->references('id')->on('kondisi_barang');

            $table->string('deskripsi', 128)->nullable();
            $table->string('kecacatan', 128)->nullable();
            $table->integer('jumlah_barang');
            $table->string('gambar_barang'); // Store the image file name
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_barang');
    }
};
