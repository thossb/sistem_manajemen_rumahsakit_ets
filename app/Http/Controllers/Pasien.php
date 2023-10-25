<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function getPasienOptions()
    {
        $PasienOptions = Pasien::all();
        return response()->json($PasienOptions);
    }
}