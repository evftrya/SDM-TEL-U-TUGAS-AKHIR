<?php

namespace App\Http\Controllers\Dupak;

use App\Http\Controllers\Controller;
use App\Models\Dupak\Pengajuan;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::where('users_id', Auth::id())->first();

        if (! $dosen) {
            return redirect()->back()->with('error', 'Data Dosen tidak ditemukan untuk pengguna ini.');
        }

        $pengajuan = Pengajuan::where('idDosen', $dosen->id)
            ->orderBy('tanggal_pengajuan', 'desc')
            ->paginate(10);

        return view('dupak.pengajuan.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dupak.pengajuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'period' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Resolve dosen for current user
        $dosen = Dosen::where('users_id', Auth::id())->first();

        if (! $dosen) {
            return redirect()->back()->with('error', 'Data Dosen tidak ditemukan untuk pengguna ini.');
        }

        // Create the pengajuan record
        $pengajuan = Pengajuan::create([
            'idDosen' => $dosen->id,
            'periode_id' => $request->period,
            'tanggal_pengajuan' => now(),
            'status' => 'pending',
        ]);

        // Process each kegiatan type
        $this->processKegiatanDetails($pengajuan, $request, 'education');
        $this->processKegiatanDetails($pengajuan, $request, 'teaching');
        $this->processKegiatanDetails($pengajuan, $request, 'research');
        $this->processKegiatanDetails($pengajuan, $request, 'committee');

        return redirect()->route('dupak.pengajuan.index')
            ->with('success', 'Pengajuan DUPAK berhasil disimpan.');
    }

    /**
     * Process kegiatan details for different types of activities.
     */
    private function processKegiatanDetails($pengajuan, $request, $type)
    {
        if ($request->has($type . '_title') && $request->has($type . '_credit')) {
            $pengajuan->details()->create([
                'kegiatan_id' => 1, // This should be mapped to the correct kegiatan ID
                'angka_kredit' => $request->input($type . '_credit'),
                // Add other fields as needed
            ]);
        }
    }
}