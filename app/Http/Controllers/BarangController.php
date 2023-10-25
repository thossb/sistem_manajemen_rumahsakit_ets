<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Barang;
use App\Http\Requests\Barang\StoreRequest;
use App\Http\Requests\Barang\UpdateRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('barang.index', [
            'barang' => Barang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('barang.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar_barang')) {
            $filePath = Storage::disk('public')->put('images/barang', request()->file('gambar_barang'));
            $validated['gambar_barang'] = $filePath;
        }

        $create = Barang::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Barang  created successfully!');
            return redirect()->route('barang.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $barang = Barang::findOrFail($id);

        return response()->view('barang.show', [
            'barang' => $barang,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $barang = Barang::findOrFail($id);

        return response()->view('barang.form', [
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('gambar_barang')) {
            Storage::disk('public')->delete($barang->gambar_barang);

            $filePath = Storage::disk('public')->put('images/barang', request()->file('gambar_barang'));
            $validated['gambar_barang'] = $filePath;
        }

        $update = $barang->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Barang  updated successfully!');
            return redirect()->route('barang.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $barang = Barang::findOrFail($id);

        Storage::disk('public')->delete($barang->gambar_barang);

        $delete = $barang->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Barang  deleted successfully!');
            return redirect()->route('barang.index');
        }

        return abort(500);
    }
}
