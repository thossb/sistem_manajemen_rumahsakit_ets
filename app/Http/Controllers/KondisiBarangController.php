<?php

namespace App\Http\Controllers;

use App\Models\KondisiBarang;
use Illuminate\Http\Request;

class KondisiBarangController extends Controller
{
    public function getKondisiBarangOptions()
    {
        $KondisiBarangOptions = KondisiBarang::all();
        return response()->json($KondisiBarangOptions);
    }
}