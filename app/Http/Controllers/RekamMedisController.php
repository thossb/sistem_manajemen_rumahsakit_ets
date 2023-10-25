<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\RekamMedis;
use App\Http\Requests\RekamMedis\StoreRequest;
use App\Http\Requests\RekamMedis\UpdateRequest;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('rekam_medis.index', [
            'rekam_medis' => RekamMedis::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('rekam_medis.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('gambar_resep')) {
            $filePath = Storage::disk('public')->put('images/rekam_medis', $request->file('gambar_resep'));
            $validated['gambar_resep'] = $filePath;
        }

        $create = RekamMedis::create($validated);

        if ($create) {
            session()->flash('notif.success', 'Rekam Medis created successfully!');
            return redirect()->route('rekam_medis.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        return response()->view('rekam_medis.show', [
            'rekam_medis' => $rekam_medis,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): Response
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        return response()->view('rekam_medis.form', [
            'rekam_medis' => $rekam_medis,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $rekam_medis = RekamMedis::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('gambar_resep')) {
            Storage::disk('public')->delete($rekam_medis->gambar_resep);

            $filePath = Storage::disk('public')->put('images/rekam_medis', $request->file('gambar_resep'));
            $validated['gambar_resep'] = $filePath;
        }

        $update = $rekam_medis->update($validated);

        if ($update) {
            session()->flash('notif.success', 'Rekam Medis updated successfully!');
            return redirect()->route('rekam_medis.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $rekam_medis = RekamMedis::findOrFail($id);

        Storage::disk('public')->delete($rekam_medis->gambar_resep);

        $delete = $rekam_medis->delete($id);

        if ($delete) {
            session()->flash('notif.success', 'Rekam Medis deleted successfully!');
            return redirect()->route('rekam_medis.index');
        }

        return abort(500);
    }
}
