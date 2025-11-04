@extends('layouts.app')

@section('content')
<x-dupak.sidebar></x-dupak.sidebar>

<div class="mt-16 md:ml-64">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-semibold">Pengajuan DUPAK</h1>
                    <a href="{{ route('dupak.pengajuan.create') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25">
                        Buat Pengajuan Baru
                    </a>
                </div>

                <!-- List Pengajuan -->
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    No. Pengajuan
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Example row, replace with actual data -->
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                    DUPAK-2024-001
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    2024-01-15
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
                                        Menunggu Validasi
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                    <a href="#" class="mr-3 text-indigo-600 hover:text-indigo-900">Lihat</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection