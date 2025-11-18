<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\work_position;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = work_position::where('type_work_position','Fakultas')->withCount('children as prodi_count')->paginate(15);
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
            'kode' => 'required|string|max:100|unique:work_positions,kode',
            'nama_fakultas' => 'required|string|max:100',
        ]);

        $validated['position_name'] = $validated['nama_fakultas'];
        $validated['type_work_position'] = 'Fakultas';
        unset($validated['nama_fakultas']);

        work_position::create($validated);

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fakultas = work_position::where('id', $id)->where('type_work_position', 'Fakultas')->with('children')->firstOrFail();
        return view('kelola_data.fakultas.show', compact('fakultas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fakulta = work_position::where('id', $id)->where('type_work_position', 'Fakultas')->firstOrFail();
        return view('kelola_data.fakultas.edit', compact('fakulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fakulta = work_position::where('id', $id)->where('type_work_position', 'Fakultas')->firstOrFail();

        $validated = $request->validate([
            'kode' => 'required|string|max:100|unique:work_positions,kode,' . $fakulta->id,
            'nama_fakultas' => 'required|string|max:100',
        ]);

        $fakulta->update([
            'kode' => $validated['kode'],
            'position_name' => $validated['nama_fakultas'],
        ]);

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakulta = work_position::where('id', $id)->where('type_work_position', 'Fakultas')->firstOrFail();
        $fakulta->delete();

        return redirect()->route('manage.fakultas.index')
            ->with('success', 'Fakultas berhasil dihapus.');
    }
}
