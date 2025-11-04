@extends('dupak.layout')

@section('content')
<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h1 class="mb-6 text-2xl font-semibold">Buat Pengajuan DUPAK</h1>

        <form method="POST" action="{{ route('dupak.pengajuan.store') }}" class="space-y-6">
            @csrf

            <!-- Basic Information -->
            <div class="p-4 rounded-lg bg-gray-50">
                <h2 class="mb-4 text-lg font-medium text-gray-900">Informasi Dasar</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ auth()->user()->nip ?? "NIP Kosong" }}"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            readonly>
                    </div>

                    <div>
                        <label for="period" class="block text-sm font-medium text-gray-700">Periode Penilaian</label>
                        <select name="period" id="period" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">Pilih Periode</option>
                            <option value="2024-1">Januari - Juni 2024</option>
                            <option value="2024-2">Juli - Desember 2024</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- NIP User Yang Saat ini adalah Dosen -->
            <!-- Jika Bukan Dosen, maka user tidak dapat mengakses halaman ini -->

            <!-- Jabatan Fungsional Saat Ini -->
            <!-- Label -->
            <!-- Isian yang disabled dengan isi yaitu Status Jabatan Saat ini -->

            <!-- Jabatan Fungsional Yang Ingin Dituju -->
            <!-- Label -->
            <!-- Periode Yang Ingin Awal Yang Diajukan -->
            <!-- Periode Yang Ingin Akhir Yang Diajukan  -->

            <!-- Tahun Yang Diajukan -->
            <!-- Label -->
            <!-- Ambil Tahun dari Dropdown Yang Ingin Diajukan Awal -->
            <!-- Ambil Tahun dari Dropdown Yang Ingin Diajukan Akhir -->

            <!-- Unsur Utama -->
            <div class="p-4 rounded-lg bg-gray-50">
                <h2 class="mb-4 text-lg font-medium text-gray-900">Unsur Utama</h2>

                <!-- Pendidikan -->
                <div class="mb-6">
                    <h3 class="mb-3 font-medium text-gray-800 text-md">A. Pendidikan</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mengikuti Pendidikan dan Memperoleh Gelar/Ijazah</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="education_title" placeholder="Nama Gelar" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="education_credit" placeholder="Angka Kredit" class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengajaran -->
                <div class="mb-6">
                    <h3 class="mb-3 font-medium text-gray-800 text-md">B. Pengajaran</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Melaksanakan Perkuliahan/Tutorial</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="teaching_subject" placeholder="Mata Kuliah" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="teaching_hours" placeholder="Jumlah Jam" class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <input type="number" name="teaching_credit" placeholder="Angka Kredit" class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Penelitian -->
                <div class="mb-6">
                    <h3 class="mb-3 font-medium text-gray-800 text-md">C. Penelitian</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Menghasilkan Karya Ilmiah</label>
                            <div class="mt-2 space-y-2">
                                <div class="flex items-center gap-4">
                                    <input type="text" name="research_title" placeholder="Judul Penelitian" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <select name="research_type" class="w-48 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Jenis Karya Ilmiah</option>
                                        <option value="journal">Jurnal Internasional</option>
                                        <option value="proceedings">Prosiding</option>
                                        <option value="book">Buku</option>
                                    </select>
                                    <input type="number" name="research_credit" placeholder="Angka Kredit" class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Unsur Penunjang -->
            <div class="p-4 rounded-lg bg-gray-50">
                <h2 class="mb-4 text-lg font-medium text-gray-900">Unsur Penunjang</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Menjadi Anggota dalam Suatu Panitia/Badan pada Perguruan Tinggi</label>
                        <div class="mt-2 space-y-2">
                            <div class="flex items-center gap-4">
                                <input type="text" name="committee_name" placeholder="Nama Kepanitiaan" class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <input type="text" name="committee_position" placeholder="Jabatan" class="w-48 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <input type="number" name="committee_credit" placeholder="Angka Kredit" class="w-32 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6">
                <a href="{{ route('dupak.pengajuan.index') }}" class="px-4 py-2 mr-4 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                    Simpan Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection