<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index($destination)
    {
        $text = ucwords(strtolower($destination));
        // dd($text);
        if(!in_array($text, ['All', 'Tpa', 'Dosen'])){
            return redirect('/manage/pegawai/list/All');
        }
        else{
            $users = User::all();
            // dd($users,$users[1]['email_institusi']);
            $send = [$text];
            return view('kelola_data.pegawai.list',compact('send','users'));
        }
    }
    
    public function new()
    {
        $send = null;
        return view('kelola_data.pegawai.input',compact('send'));
        
    }


    public function create(Request $request)
    {
        // Jalankan validasi
        $validated = $request->validate([
            // Data diri
            'nama_lengkap'        => ['required', 'string', 'max:100'],
            'username'            => ['required', 'alpha_dash', 'min:3', 'max:20'],
            'telepon'             => ['nullable', 'regex:/^0\d{9,14}$/'],
            'alamat'              => ['nullable', 'string', 'max:300'],

            'email_pribadi'       => ['nullable', 'email:rfc,dns', 'max:150'],
            'email_institusi'     => ['nullable', 'email:rfc,dns', 'max:150'],

            'jenis_kelamin'       => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tempat_lahir'        => ['nullable', 'string', 'max:100'],
            'tgl_lahir'           => ['nullable', 'date', 'before:today'],

            'tipe_pegawai'        => ['required', Rule::in(['Dosen', 'TPA'])],
            'tgl_bergabung'       => ['nullable', 'date', 'after_or_equal:tgl_lahir'],
            'status_kepegawaian' => [
                                        'required',
                                        Rule::when(
                                            $request->tipe_pegawai === 'Dosen',
                                            Rule::in(['Dosen Tamu','Honorer', 'Dosen Tetap', 'Dosen Paruh Waktu']),
                                            Rule::in(['Pegawai Tetap', 'Pegawai Kontrak', 'Magang'])
                                        ),
                                    ],
            // Data kepegawaian
            'nidn'                => [Rule::requiredIf($request->tipe_pegawai === 'Dosen'), 'nullable', 'string', 'max:20'],
            'nip'                 => [
                                        Rule::requiredIf($request->tipe_pegawai === 'TPA'),
                                        'nullable',
                                        'string',
                                        'max:30',
                                     ],
            'jfa'                 => [Rule::requiredIf($request->tipe_pegawai === 'Dosen'), 'nullable', Rule::in(['Asisten Ahli', 'Lektor', 'Lektor Kepala', 'Guru Besar'])],

            // Data pendidikan
            'jenjang_pendidikan'  => ['required', Rule::in(['D3', 'S1/D4', 'S2', 'S3'])],
            'bidang_pendidikan'   => ['nullable', 'string', 'max:150'],
            'jurusan'             => ['nullable', 'string', 'max:150'],
            'nama_kampus'         => ['nullable', 'string', 'max:150'],
            'alamat_kampus'       => ['nullable', 'string', 'max:150'],

            'tahun_lulus'         => ['nullable', 'integer', 'digits:4', 'between:1900,' . now()->year],
            'nilai'               => ['nullable', 'numeric', 'min:0', 'max:4'],
            'gelar'               => ['nullable', 'string', 'max:50'],
            'singkatan_gelar'     => ['nullable', 'string', 'max:20'],

            'ijazah_file'         => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ], [
            // Pesan error umum
            'required' => ':attribute wajib diisi.',
            'alpha_dash' => ':attribute hanya boleh berisi huruf, angka, strip (-), dan garis bawah (_).',
            'max' => ':attribute maksimal :max karakter.',
            'min' => ':attribute minimal :min karakter.',
            'email' => 'Format :attribute tidak valid.',
            'in' => ':attribute tidak valid.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'before' => ':attribute harus sebelum hari ini.',
            'after_or_equal' => ':attribute harus sama atau setelah :date.',
            'numeric' => ':attribute harus berupa angka.',
            'integer' => ':attribute harus berupa angka bulat.',
            'digits' => ':attribute harus terdiri dari :digits digit.',
            'between' => ':attribute harus antara :min dan :max.',
            'regex' => 'Format :attribute tidak valid.',
            'file' => ':attribute harus berupa file.',
            'mimes' => ':attribute harus berformat: :values.',
            'max.file' => ':attribute maksimal :max kilobyte.',

            // Pesan khusus
            'telepon.regex' => 'Nomor telepon harus diawali 0 dan berjumlah 10–13 digit.',
            'nidn.required' => 'NIDN wajib diisi untuk Dosen.',
            'nomor_induk_pegawai.required' => 'Nomor Induk Pegawai/NUPTK wajib diisi.',
            'jfa.required' => 'JFA wajib dipilih untuk Dosen.',
            'status_kepegawaian.in' => $request->tipe_pegawai === 'Dosen'
                ? 'Untuk Dosen, status kepegawaian hanya boleh Dosen Tamu/Honorer/Dosen Tetap/Dosen Paruh Waktu'
                : 'Status kepegawaian tidak valid.',
        ]);

        try {
            $user = User::create($validated);
            if($user){
                if($validated['tipe_pegawai']=='Dosen'){
                    $pegawai = Dosen::create($validated);
                }
            }
            return response()->json([
                'success' => true,
                'message' => 'User berhasil dibuat!',
                'data' => $user
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat user',
                'error' => $e->getMessage()
            ], 500);
        }

        // return redirect(route('manage.pegawai.list', ['destination' => 'All']));

        // dd($request,$request->file('ijazah_file'));


        // return back()->with('success', 'Data pegawai berhasil disimpan!');
    }


    public function employeeInfo()
    {
        return view('kelola_data.pegawai.view.employee-information');
    }

    public function personalInfo($idUser)
    {
        // dd($idUser);
        return view('kelola_data.pegawai.view.personal-information');
    }

    public function riwayatJabatan()
    {
        return view('kelola_data.pegawai.view.riwayat-jabatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $users)
    {
        //
    }
}
