<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';
    protected $fillable = ['dokter'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class, 'dokter');
    }
}
