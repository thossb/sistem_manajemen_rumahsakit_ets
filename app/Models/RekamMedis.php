<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $primaryKey = 'id';

    protected $fillable = ['pasien', 'dokter', 'kondisi_kesehatan', 'suhu_tubuh', 'resep_file'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter');
    }
}