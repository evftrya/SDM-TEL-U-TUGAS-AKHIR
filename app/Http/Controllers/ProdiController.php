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
        // Ambil semua prodi dengan relasi
        $prodis = Prodi::with('fakultas')->get();

        // Hitung statistik untuk setiap prodi
        $prodiStats = $prodis->map(function ($prodi) {
            // Ambil dosen yang terkait dengan prodi ini
            // CATATAN: Jika tabel dosens belum memiliki prodi_id,
            // maka semua statistik akan bernilai 0
            $dosens = collect([]); // Default empty collection

            // Cek apakah relasi dosen ada dan tabel memiliki prodi_id
            try {
                if (method_exists($prodi, 'dosen')) {
                    $dosens = $prodi->dosen()
                        ->with([
                            'pegawai.riwayatNip.statusPegawai',
                            'riwayatJabatanFungsional.jabatanFungsional',
                            'pegawai.riwayatJenjangPendidikan.refJenjangPendidikan'
                        ])
                        ->get();
                }
            } catch (\Exception $e) {
                // Jika ada error (misal kolom prodi_id belum ada), gunakan collection kosong
                $dosens = collect([]);
            }

            $totalDosen = $dosens->count();

            // Hitung pendidikan S2 dan S3
            $s2Count = 0;
            $s3Count = 0;

            foreach ($dosens as $dosen) {
                if ($dosen->pegawai && $dosen->pegawai->riwayatJenjangPendidikan) {
                    $latestPendidikan = $dosen->pegawai->riwayatJenjangPendidikan
                        ->sortByDesc('tahun_lulus')
                        ->first();

                    if ($latestPendidikan && $latestPendidikan->refJenjangPendidikan) {
                        $jenjang = strtoupper($latestPendidikan->refJenjangPendidikan->jenjang_pendidikan ?? '');
                        if (str_contains($jenjang, 'S2') || str_contains($jenjang, 'MAGISTER')) {
                            $s2Count++;
                        } elseif (str_contains($jenjang, 'S3') || str_contains($jenjang, 'DOKTOR')) {
                            $s3Count++;
                        }
                    }
                }
            }

            // Hitung jabatan fungsional
            $njadCount = 0; // Non-JFA Dosen
            $aaCount = 0;   // Asisten Ahli
            $lCount = 0;    // Lektor
            $lkCount = 0;   // Lektor Kepala
            $gbCount = 0;   // Guru Besar

            foreach ($dosens as $dosen) {
                if ($dosen->riwayatJabatanFungsional && $dosen->riwayatJabatanFungsional->count() > 0) {
                    $latestJafung = $dosen->riwayatJabatanFungsional
                        ->sortByDesc('tmt_jafung')
                        ->first();

                    if ($latestJafung && $latestJafung->jabatanFungsional) {
                        $jafung = strtoupper($latestJafung->jabatanFungsional->nama_jafung ?? '');

                        if (str_contains($jafung, 'GURU BESAR') || str_contains($jafung, 'PROFESOR')) {
                            $gbCount++;
                        } elseif (str_contains($jafung, 'LEKTOR KEPALA')) {
                            $lkCount++;
                        } elseif (str_contains($jafung, 'LEKTOR')) {
                            $lCount++;
                        } elseif (str_contains($jafung, 'ASISTEN AHLI')) {
                            $aaCount++;
                        }
                    } else {
                        $njadCount++;
                    }
                } else {
                    $njadCount++;
                }
            }

            // Hitung status kepegawaian
            $tetapCount = 0;
            $calonTetapCount = 0;
            $profesionalCount = 0;
            $perbantuanCount = 0;

            foreach ($dosens as $dosen) {
                if ($dosen->pegawai && $dosen->pegawai->riwayatNip) {
                    $latestNip = $dosen->pegawai->riwayatNip
                        ->where('is_active', true)
                        ->sortByDesc('tanggal_berlaku')
                        ->first();

                    if ($latestNip && $latestNip->statusPegawai) {
                        $status = strtoupper($latestNip->statusPegawai->status_pegawai ?? '');

                        if (str_contains($status, 'TETAP') && !str_contains($status, 'CALON')) {
                            $tetapCount++;
                        } elseif (str_contains($status, 'CALON')) {
                            $calonTetapCount++;
                        } elseif (str_contains($status, 'PROFESIONAL')) {
                            $profesionalCount++;
                        } elseif (str_contains($status, 'PERBANTUAN')) {
                            $perbantuanCount++;
                        }
                    }
                }
            }

            // Hitung persentase dengan batas maksimal 100%
            $persenS3 = $totalDosen > 0 ? min($s3Count / $totalDosen, 1.0) : 0;
            $llkgb = $totalDosen > 0 ? min(($lCount + $lkCount + $gbCount) / $totalDosen, 1.0) : 0;
            $jfa = $totalDosen > 0 ? min(($aaCount + $lCount + $lkCount + $gbCount) / $totalDosen, 1.0) : 0;

            // Check if there's cached manual data
            $statsKey = 'prodi_stats_' . $prodi->id;
            $cachedStats = cache()->get($statsKey);

            // If cached data exists, merge it with calculated data
            if ($cachedStats) {
                $s2Count = $cachedStats['s2'];
                $s3Count = $cachedStats['s3'];
                $njadCount = $cachedStats['njad'];
                $aaCount = $cachedStats['aa'];
                $lCount = $cachedStats['l'];
                $lkCount = $cachedStats['lk'];
                $gbCount = $cachedStats['gb'];
                $tetapCount = $cachedStats['tetap'];
                $calonTetapCount = $cachedStats['calon_tetap'];
                $profesionalCount = $cachedStats['profesional'];
                $perbantuanCount = $cachedStats['perbantuan'];

                // Recalculate totals and percentages with 100% limit
                $totalDosen = $tetapCount + $calonTetapCount + $profesionalCount + $perbantuanCount;
                $persenS3 = $totalDosen > 0 ? min($s3Count / $totalDosen, 1.0) : 0;
                $llkgb = $totalDosen > 0 ? min(($lCount + $lkCount + $gbCount) / $totalDosen, 1.0) : 0;
                $jfa = $totalDosen > 0 ? min(($aaCount + $lCount + $lkCount + $gbCount) / $totalDosen, 1.0) : 0;
            }

            return [
                'id' => $prodi->id,
                'nama_prodi' => $prodi->nama_prodi,
                'fakultas' => $prodi->fakultas->nama_fakultas ?? '-',
                'total_dosen' => $totalDosen,
                's2' => $s2Count,
                's3' => $s3Count,
                'persen_s3' => $persenS3,
                'njad' => $njadCount,
                'aa' => $aaCount,
                'l' => $lCount,
                'lk' => $lkCount,
                'gb' => $gbCount,
                'llkgb' => $llkgb,
                'jfa' => $jfa,
                'tetap' => $tetapCount,
                'calon_tetap' => $calonTetapCount,
                'profesional' => $profesionalCount,
                'perbantuan' => $perbantuanCount,
            ];
        });

        // Hitung total
        $totals = [
            'total_dosen' => $prodiStats->sum('total_dosen'),
            's2' => $prodiStats->sum('s2'),
            's3' => $prodiStats->sum('s3'),
            'njad' => $prodiStats->sum('njad'),
            'aa' => $prodiStats->sum('aa'),
            'l' => $prodiStats->sum('l'),
            'lk' => $prodiStats->sum('lk'),
            'gb' => $prodiStats->sum('gb'),
            'tetap' => $prodiStats->sum('tetap'),
            'calon_tetap' => $prodiStats->sum('calon_tetap'),
            'profesional' => $prodiStats->sum('profesional'),
            'perbantuan' => $prodiStats->sum('perbantuan'),
        ];

        $totals['persen_s3'] = $totals['total_dosen'] > 0 ? min($totals['s3'] / $totals['total_dosen'], 1.0) : 0;
        $totals['llkgb'] = $totals['total_dosen'] > 0 ? min(($totals['l'] + $totals['lk'] + $totals['gb']) / $totals['total_dosen'], 1.0) : 0;
        $totals['jfa'] = $totals['total_dosen'] > 0 ? min(($totals['aa'] + $totals['l'] + $totals['lk'] + $totals['gb']) / $totals['total_dosen'], 1.0) : 0;

        $fakultas = Fakultas::all();
        return view('kelola_data.prodi.index', compact('prodiStats', 'totals', 'fakultas'));
    }    /**
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
            cache()->put($statsKey, $validated, now()->addDays(30));

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
