@extends('dupak.layout')

@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
        <h1 class="text-2xl font-semibold mb-6">DUPAK Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card Pengajuan DUPAK -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Pengajuan DUPAK</h3>
                <p class="text-gray-600 mb-4">Ajukan DUPAK (Daftar Usulan Penetapan Angka Kredit) baru.</p>
                <a href="{{ route('dupak.pengajuan.create') }}" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Buat Pengajuan
                </a>
            </div>

            <!-- Card Riwayat DUPAK -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Riwayat DUPAK</h3>
                <p class="text-gray-600 mb-4">Lihat riwayat pengajuan DUPAK Anda.</p>
                <a href="{{ route('dupak.riwayat.index') }}" class="inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Lihat Riwayat
                </a>
            </div>

            @if (auth()->user()->isAdmin)
            <!-- Card Validasi DUPAK (Admin Only) -->
            <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Validasi DUPAK</h3>
                <p class="text-gray-600 mb-4">Validasi pengajuan DUPAK dari pegawai.</p>
                <a href="{{ route('dupak.validasi.index') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Validasi Pengajuan
                </a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection