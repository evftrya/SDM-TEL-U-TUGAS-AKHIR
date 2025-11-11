<!-- views/dupak/dashboard.blade.php -->
@extends('layouts.app')

@section('content')

<x-dupak.sidebar></x-dupak.sidebar>
<!-- Main Content -->
<div class="mt-16 md:ml-64">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="mb-6 text-2xl font-semibold">Selamat Datang Di Dasbor DUPAK</h1>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <!-- Card Pengajuan DUPAK -->
                    <!-- <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h3 class="mb-2 text-lg font-medium text-gray-900">Pengajuan DUPAK</h3>
                        <p class="mb-4 text-gray-600">Ajukan DUPAK (Daftar Usulan Penetapan Angka Kredit) baru.</p>
                        <a href="{{ route('dupak.pengajuan.create') }}" class="inline-block px-4 py-2 text-white bg-blue-900 rounded hover:bg-blue-950">
                            Buat Pengajuan
                        </a>
                    </div> -->

                    <div class="col-span-1 p-6 bg-white border border-gray-200 rounded-lg shadow md:col-span-2">
                        <div class="flex items-start justify-between">
                            <div>
                                <h3 class="mb-1 text-lg font-medium text-gray-900">Informasi KUM</h3>
                                <p class="text-sm text-gray-600">Ringkasan KUM, jabatan, dan progress target</p>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-gray-500">Jabatan</span>
                                <div class="mt-1 text-sm font-semibold text-gray-900">{{ $user->jabatan ?? 'Belum diisi' }}</div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3">
                            <div>
                                <div class="text-xs text-gray-500">KUM Saat Ini</div>
                                <div class="mt-1 text-2xl font-bold text-blue-900">{{ number_format($currentKum , 2, ',', '.') }}</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">Target KUM</div>
                                <div class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($goalKum, 0, ',', '.') }}</div>
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">Tersisa untuk Target</div>
                                <div class="mt-1 text-lg font-semibold text-gray-900">{{ number_format($remaining, 2, ',', '.') }}</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-600">Progress menuju target</div>
                                <div class="text-sm font-medium text-gray-700">{{ number_format($percent, 0) }}%</div>
                            </div>

                            <div class="w-full h-4 mt-2 overflow-hidden bg-gray-200 rounded-full">
                                <div class="h-full {{ $statusColor }}" style="width: {{ $percent }}%"></div>
                            </div>

                            @if($updatedAt ?? false)
                            <div class="mt-2 text-xs text-gray-500">Terakhir diperbarui: {{ \Carbon\Carbon::parse($updatedAt)->diffForHumans() ?? 'Tidak tersedia' }}</div>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <!--route('dupak.kum.details') -->
                            <a href="" class="inline-block px-4 py-2 text-sm text-white bg-blue-900 rounded hover:bg-blue-950">Detail KUM</a>

                            <!--  route('dupak.pengajuan.create') -->
                            <a href="" class="inline-block px-4 py-2 text-sm text-blue-900 border border-blue-900 rounded hover:bg-indigo-50">Ajukan Tambahan</a>

                            <!-- route('dupak.kum.goal.edit') -->
                            <a href="" class="inline-block px-4 py-2 text-sm text-gray-700 bg-gray-100 border border-gray-200 rounded hover:bg-gray-200">Atur Target</a>
                        </div>
                    </div>

                    <!-- Card Riwayat DUPAK -->
                    <!-- <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h3 class="mb-2 text-lg font-medium text-gray-900">Riwayat DUPAK</h3>
                        <p class="mb-4 text-gray-600">Lihat riwayat pengajuan DUPAK Anda.</p>
                        <a href="{{ route('dupak.riwayat.index') }}" class="inline-block px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700">
                            Lihat Riwayat
                        </a>
                    </div> -->

                    @if (auth()->user()->is_admin)
                    <!-- Card Validasi DUPAK (Admin Only) -->
                    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow">
                        <h3 class="mb-2 text-lg font-medium text-gray-900">Validasi DUPAK</h3>
                        <p class="mb-4 text-gray-600">Validasi pengajuan DUPAK dari pegawai.</p>
                        <a href="{{ route('dupak.validasi.index') }}" class="inline-block px-4 py-2 text-white bg-blue-900 rounded hover:bg-blue-950">
                            Validasi Pengajuan
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection