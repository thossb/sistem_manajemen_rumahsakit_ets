<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barang';

    protected $fillable = [
        'jenis_barang',
    ];

    // Define any relationships or methods specific to 'jenis_barang' here.
    public function barang()
    {
        return $this->hasMany(Barang::class, 'jenis_barang');
    }

}
