<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    public function getJenisBarangOptions()
    {
        $jenisBarangOptions = JenisBarang::all();
        return response()->json($jenisBarangOptions);
    }
}