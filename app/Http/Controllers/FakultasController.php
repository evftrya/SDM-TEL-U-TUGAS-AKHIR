<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::withCount('prodi')->paginate(15);
        return view('kelola_data.fakultas.index', compact('fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelola_data.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:faculties,kode',
            'nama_fakultas' => 'required|string|max:100',
        ]);

        Fakultas::create($validated);

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakulta)
    {
        $fakulta->load('prodi');
        return view('kelola_data.fakultas.show', compact('fakulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakulta)
    {
        return view('kelola_data.fakultas.edit', compact('fakulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakulta)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:20|unique:faculties,kode,' . $fakulta->id,
            'nama_fakultas' => 'required|string|max:100',
        ]);

        $fakulta->update($validated);

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakulta)
    {
        $fakulta->delete();

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil dihapus.');
    }
}
