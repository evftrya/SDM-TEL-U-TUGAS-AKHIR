@extends('dupak.layout')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold">Validasi Pengajuan DUPAK</h1>
            <div>
                <a href="{{ route('dupak.validasi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    Kembali
                </a>
            </div>
        </div>

        <!-- Basic Information -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Informasi Pengajuan</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">No. Pengajuan</p>
                    <p class="mt-1">DUPAK-2024-001</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Periode</p>
                    <p class="mt-1">Januari - Juni 2024</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Nama Dosen</p>
                    <p class="mt-1">Dr. Ahmad Santoso</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">NIP</p>
                    <p class="mt-1">198501012010121001</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Fakultas</p>
                    <p class="mt-1">Fakultas Teknik</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Jurusan</p>
                    <p class="mt-1">Teknik Informatika</p>
                </div>
            </div>
        </div>

        <!-- Validation Form -->
        <form method="POST" action="{{ route('dupak.validasi.update', ['id' => 'DUPAK-2024-001']) }}">
            @csrf
            @method('PATCH')

            <!-- Unsur Utama -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Unsur Utama</h2>

                <!-- Pendidikan -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">A. Pendidikan</h3>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="grid grid-cols-12 gap-4 mb-2 font-medium text-sm text-gray-700">
                            <div class="col-span-6">Kegiatan</div>
                            <div class="col-span-2">Bukti</div>
                            <div class="col-span-2">Angka Kredit Diajukan</div>
                            <div class="col-span-2">Angka Kredit Disetujui</div>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-12 gap-4 items-center">
                                <div class="col-span-6">
                                    <p class="text-sm">Mengikuti pendidikan formal dan memperoleh gelar/sebutan Doktor</p>
                                </div>
                                <div class="col-span-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm">Lihat Dokumen</a>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm">200</p>
                                </div>
                                <div class="col-span-2">
                                    <input type="number" name="education_credit" value="200" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengajaran -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">B. Pengajaran</h3>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="grid grid-cols-12 gap-4 mb-2 font-medium text-sm text-gray-700">
                            <div class="col-span-6">Kegiatan</div>
                            <div class="col-span-2">Bukti</div>
                            <div class="col-span-2">Angka Kredit Diajukan</div>
                            <div class="col-span-2">Angka Kredit Disetujui</div>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-12 gap-4 items-center">
                                <div class="col-span-6">
                                    <p class="text-sm">Mengajar mata kuliah Pemrograman Web (3 SKS)</p>
                                </div>
                                <div class="col-span-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm">Lihat Dokumen</a>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm">5.75</p>
                                </div>
                                <div class="col-span-2">
                                    <input type="number" step="0.25" name="teaching_credit" value="5.75" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Penelitian -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">C. Penelitian</h3>
                    <div class="bg-white rounded-lg p-4 shadow-sm">
                        <div class="grid grid-cols-12 gap-4 mb-2 font-medium text-sm text-gray-700">
                            <div class="col-span-6">Kegiatan</div>
                            <div class="col-span-2">Bukti</div>
                            <div class="col-span-2">Angka Kredit Diajukan</div>
                            <div class="col-span-2">Angka Kredit Disetujui</div>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-12 gap-4 items-center">
                                <div class="col-span-6">
                                    <p class="text-sm">Publikasi di Jurnal Internasional: "Machine Learning Applications in Education"</p>
                                </div>
                                <div class="col-span-2">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 text-sm">Lihat Dokumen</a>
                                </div>
                                <div class="col-span-2">
                                    <p class="text-sm">40</p>
                                </div>
                                <div class="col-span-2">
                                    <input type="number" name="research_credit" value="40" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Validation Decision -->
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Keputusan Validasi</h2>
                <div class="space-y-4">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Catatan</label>
                        <textarea id="notes" name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-4">
                    Batal
                </button>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Simpan Validasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection