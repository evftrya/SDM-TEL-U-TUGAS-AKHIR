<?php

namespace App\Http\Controllers;

use App\Models\SertifikasiDosen;
use App\Models\Dosen;
use Illuminate\Http\Request;

class SertifikasiDosenController extends Controller
{
    public function index()
    {
        $sertifikasi = SertifikasiDosen::with(['dosen.pegawai', 'dosen.prodi'])->get();
        return view('kelola_data.sertifikasi_dosen.list', compact('sertifikasi'));
    }

    public function create()
    {
        $dosens = Dosen::with('pegawai')->whereDoesntHave('sertifikasi')->get();
        return view('kelola_data.sertifikasi_dosen.input', compact('dosens'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dosen_id' => 'required|uuid|exists:dosens,id|unique:sertifikasi_dosens,dosen_id',
            'nomor_registrasi' => 'nullable|string|max:50|unique:sertifikasi_dosens,nomor_registrasi',
            'no_sk' => 'nullable|string|max:100',
            'tanggal_sk' => 'nullable|date',
        ]);

        SertifikasiDosen::create($validated);

        return redirect()->route('manage.sertifikasi-dosen.list')->with('success', 'Data sertifikasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sertifikasi = SertifikasiDosen::findOrFail($id);
        $dosens = Dosen::with('pegawai')->get();
        return view('kelola_data.sertifikasi_dosen.edit', compact('sertifikasi', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $sertifikasi = SertifikasiDosen::findOrFail($id);

        $validated = $request->validate([
            'dosen_id' => 'required|uuid|exists:dosens,id|unique:sertifikasi_dosens,dosen_id,' . $id,
            'nomor_registrasi' => 'nullable|string|max:50|unique:sertifikasi_dosens,nomor_registrasi,' . $id,
            'no_sk' => 'nullable|string|max:100',
            'tanggal_sk' => 'nullable|date',
        ]);

        $sertifikasi->update($validated);

        return redirect()->route('manage.sertifikasi-dosen.list')->with('success', 'Data sertifikasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sertifikasi = SertifikasiDosen::findOrFail($id);
        $sertifikasi->delete();

        return redirect()->route('manage.sertifikasi-dosen.list')->with('success', 'Data sertifikasi berhasil dihapus');
    }

    public function view($id)
    {
        $sertifikasi = SertifikasiDosen::with(['dosen.pegawai', 'dosen.prodi'])->findOrFail($id);
        return view('kelola_data.sertifikasi_dosen.view', compact('sertifikasi'));
    }

    public function upload()
    {
        return view('kelola_data.sertifikasi_dosen.upload');
    }

    public function processUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        return redirect()->route('manage.sertifikasi-dosen.list')->with('success', 'File berhasil diupload');
    }
}
