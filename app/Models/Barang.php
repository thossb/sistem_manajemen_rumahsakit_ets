<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'daftar_barang';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jenis_barang',
        'kondisi_barang',
        'deskripsi',
        'kecacatan',
        'jumlah_barang',
        'gambar_barang',
    ];

    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang');
    }

    public function kondisiBarang()
    {
        return $this->belongsTo(KondisiBarang::class, 'kondisi_barang');
    }
}