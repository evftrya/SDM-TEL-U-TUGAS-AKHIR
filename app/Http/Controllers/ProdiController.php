<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->orderBy('nama_prodi')->get();
        return view('kelola_data.prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('kelola_data.prodi.create', compact('fakultas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fakultas_id' => 'required|exists:faculties,id',
            'kode' => 'required|string|max:100',
            'nama_prodi' => 'required|string|max:100',
        ]);

        Prodi::create($validated);

        return redirect()->route('manage.prodi.index')
            ->with('success', 'Program Studi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        $prodi->load('fakultas', 'dosen');
        return view('kelola_data.prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        return view('kelola_data.prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validated = $request->validate([
            'fakultas_id' => 'required|exists:faculties,id',
            'kode' => 'required|string|max:100',
            'nama_prodi' => 'required|string|max:100',
        ]);

        $prodi->update($validated);

        return redirect()->route('manage.prodi.index')
            ->with('success', 'Program Studi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return redirect()->route('manage.prodi.index')
            ->with('success', 'Program Studi berhasil dihapus.');
    }

    /**
     * Get cached statistics for a prodi
     */
    public function getCachedStats(Prodi $prodi)
    {
        $statsKey = 'prodi_stats_' . $prodi->id;
        $cachedStats = cache()->get($statsKey);

        if ($cachedStats) {
            return response()->json($cachedStats);
        }

        // Return default values if no cache exists
        return response()->json([
            's2' => 0,
            's3' => 0,
            'njad' => 0,
            'aa' => 0,
            'l' => 0,
            'lk' => 0,
            'gb' => 0,
            'tetap' => 0,
            'calon_tetap' => 0,
            'profesional' => 0,
            'perbantuan' => 0,
        ]);
    }

    /**
     * Update statistics for a prodi
     */
    public function updateStats(Request $request, Prodi $prodi)
    {
        try {
            $validated = $request->validate([
                's2' => 'required|integer|min:0',
                's3' => 'required|integer|min:0',
                'njad' => 'required|integer|min:0',
                'aa' => 'required|integer|min:0',
                'l' => 'required|integer|min:0',
                'lk' => 'required|integer|min:0',
                'gb' => 'required|integer|min:0',
                'tetap' => 'required|integer|min:0',
                'calon_tetap' => 'required|integer|min:0',
                'profesional' => 'required|integer|min:0',
                'perbantuan' => 'required|integer|min:0',
            ]);

            // Calculate total dosen
            $totalDosen = $validated['tetap'] + $validated['calon_tetap'] +
                         $validated['profesional'] + $validated['perbantuan'];

            // Validate: Total pendidikan should not exceed total dosen
            $totalPendidikan = $validated['s2'] + $validated['s3'];
            if ($totalPendidikan > $totalDosen) {
                return response()->json([
                    'success' => false,
                    'message' => "Total S2 + S3 ($totalPendidikan) melebihi Total Dosen ($totalDosen)"
                ], 422);
            }

            // Validate: Total JFA should not exceed total dosen
            $totalJFA = $validated['njad'] + $validated['aa'] + $validated['l'] +
                       $validated['lk'] + $validated['gb'];
            if ($totalJFA > $totalDosen) {
                return response()->json([
                    'success' => false,
                    'message' => "Total JFA (NJAD+AA+L+LK+GB = $totalJFA) melebihi Total Dosen ($totalDosen)"
                ], 422);
            }

            // Calculate percentages and ensure they don't exceed 100%
            $persenS3 = $totalDosen > 0 ? min(($validated['s3'] / $totalDosen), 1.0) : 0;
            $llkgb = $totalDosen > 0 ? min((($validated['l'] + $validated['lk'] + $validated['gb']) / $totalDosen), 1.0) : 0;
            $jfa = $totalDosen > 0 ? min((($validated['aa'] + $validated['l'] + $validated['lk'] + $validated['gb']) / $totalDosen), 1.0) : 0;

            // Store statistics in cache with prodi id
            $statsKey = 'prodi_stats_' . $prodi->id;
            cache()->forever($statsKey, $validated);

            return response()->json([
                'success' => true,
                'message' => 'Statistik berhasil diperbarui',
                'data' => array_merge($validated, [
                    'total_dosen' => $totalDosen,
                    'persen_s3' => round($persenS3 * 100, 2),
                    'llkgb' => round($llkgb * 100, 2),
                    'jfa' => round($jfa * 100, 2),
                ])
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
