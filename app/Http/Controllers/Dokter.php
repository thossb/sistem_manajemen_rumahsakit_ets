<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function getDokterOptions()
    {
        $DokterOptions = Dokter::all();
        return response()->json($DokterOptions);
    }
}