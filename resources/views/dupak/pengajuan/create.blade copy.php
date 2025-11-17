@extends('dupak.layout')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h1 class="text-2xl font-semibold mb-6">Buat Pengajuan DUPAK</h1>

        <form method="POST" action="{{ route('dupak.pengajuan.store') }}" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ auth()->user()->nip }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" readonly>
                    </div>

                    <div>
                        <label for="period" class="block text-sm font-medium text-gray-700">Periode Penilaian</label>
                        <select name="period" id="period" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Pilih Periode</option>
                            <option value="2024-1">Januari - Juni 2024</option>
                            <option value="2024-2">Juli - Desember 2024</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Unsur Utama -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Unsur Utama</h2>
                
                <!-- Pendidikan -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">A. Pendidikan</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mengikuti Pendidikan dan Memperoleh Gelar/Ijazah</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="education_title" placeholder="Nama Gelar" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="education_credit" placeholder="Angka Kredit" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengajaran -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">B. Pengajaran</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Melaksanakan Perkuliahan/Tutorial</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="teaching_subject" placeholder="Mata Kuliah" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="teaching_hours" placeholder="Jumlah Jam" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="teaching_credit" placeholder="Angka Kredit" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Penelitian -->
                <div class="mb-6">
                    <h3 class="text-md font-medium text-gray-800 mb-3">C. Penelitian</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Menghasilkan Karya Ilmiah</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="research_title" placeholder="Judul Penelitian" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <select name="research_type" class="w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Jenis Karya Ilmiah</option>
                                        <option value="journal">Jurnal Internasional</option>
                                        <option value="proceedings">Prosiding</option>
                                        <option value="book">Buku</option>
                                    </select>
                                    <input type="number" name="research_credit" placeholder="Angka Kredit" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unsur Penunjang -->
            <div class="bg-gray-50 p-4 rounded-lg">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Unsur Penunjang</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center gap-4">
                                <input type="text" name="committee_name" placeholder="Nama Kepanitiaan" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <input type="text" name="committee_position" placeholder="Jabatan" class="w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <input type="number" name="committee_credit" placeholder="Angka Kredit" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <a href="{{ route('dupak.pengajuan.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 mr-4">
                    Batal
                </a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    Simpan Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection