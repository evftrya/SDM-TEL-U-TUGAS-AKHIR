@extends('layouts.base-1')

@section('sidebar-menu')
    <style>
        #page-name {
            margin-bottom: 0px !important;
        }
    </style>
    @include('kelola_data.parts.sidebar-profile')
@endsection

@section('content-base')
    <div
        class="sticky top-0 z-10 mb-4 -mx-4 border-b border-gray-200/70 bg-white/70 px-4 py-3 backdrop-blur supports-[backdrop-filter]:bg-white/50 dark:border-gray-800 dark:bg-gray-950/60">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div
                    class="h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white ring-2 ring-white dark:ring-gray-900">
                    {{-- If you have an avatar, replace this with <img> --}}
                    <div class="flex h-full w-full items-center justify-center text-sm font-semibold">TA</div>
                </div>
                <div>
                    <h1 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-gray-100">Profil Dosen</h1>
                    <div class="flex flex-row gap-2 w-full">
                        <span
                            class="mt-2 inline-flex items-center rounded-full bg-red-50 px-2.5 py-0.5 text-[11px] font-medium text-red-700 ring-1 ring-inset ring-red-200 dark:bg-red-950/40 dark:text-red-200 dark:ring-red-900">
                            Super Admin
                        </span>

                        <span
                            class="mt-2 inline-flex items-center rounded-full bg-green-50 px-2.5 py-0.5 text-[11px] font-medium text-green-700 ring-1 ring-inset ring-green-200 dark:bg-green-950/40 dark:text-green-200 dark:ring-green-900">
                            TPA
                        </span>

                        <span
                            class="mt-2 inline-flex items-center rounded-full bg-yellow-50 px-2.5 py-0.5 text-[11px] font-medium text-yellow-700 ring-1 ring-inset ring-yellow-200 dark:bg-yellow-950/40 dark:text-yellow-200 dark:ring-yellow-900">
                            Dosen
                        </span>

                        <span
                            class="mt-2 inline-flex items-center rounded-full bg-purple-50 px-2.5 py-0.5 text-[11px] font-medium text-purple-700 ring-1 ring-inset ring-purple-200 dark:bg-purple-950/40 dark:text-purple-200 dark:ring-purple-900">
                            Jabatan
                        </span>

                    </div>
                    {{-- <p class="text-xs text-gray-500 dark:text-gray-400">Ringkasan data personal & kepegawaian</p> --}}
                </div>
            </div>
            <div class="flex items-center gap-2">
                <a href="#"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-2 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800">
                    Lihat Riwayat
                </a>
                <a href="#"
                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-3.5 py-2 text-xs font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-800">
                    ✏️ <span>Ubah Data</span>
                </a>
            </div>
        </div>
    </div>
    @yield('content-profile')
@endsection
