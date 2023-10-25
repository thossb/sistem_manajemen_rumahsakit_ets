<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiBarang extends Model
{
    use HasFactory;

    protected $table = 'kondisi_barang';

    protected $fillable = [
        'kondisi_barang',
    ];

    // Define any relationships or methods specific to 'kondisi_barang' here.
    public function barang()
    {
        return $this->hasMany(Barang::class, 'kondisi_barang');
    }
}
