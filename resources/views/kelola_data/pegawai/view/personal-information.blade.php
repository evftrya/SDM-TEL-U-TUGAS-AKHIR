@php
    $active_sidebar = 'Personal Information';
@endphp

@extends('kelola_data.base-profile')

@section('content-profile')
    <div class="w-full max-w-full">
        

        {{-- Content Layout --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            {{-- Left column: Identity card --}}
            <section class="lg:col-span-1">
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex items-start gap-4">
                        <div
                            class="h-16 w-16 shrink-0 overflow-hidden rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white ring-2 ring-white dark:ring-gray-900">
                            <div class="flex h-full w-full items-center justify-center text-base font-semibold">TA</div>
                        </div>
                        <div class="min-w-0">
                            <h2 class="truncate text-base font-semibold text-gray-900 dark:text-gray-100">Tirex Alfred</h2>
                            <p class="truncate text-sm text-gray-500 dark:text-gray-400">Tirex Alfred, S.T., M.T.</p>

                        </div>
                    </div>

                    <dl class="mt-6 space-y-3">
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Username</dt>
                            <dd class="truncate text-sm font-medium text-gray-900 dark:text-gray-100">trxalf</dd>
                        </div>
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-xs text-gray-500 dark:text-gray-400">NIDN</dt>
                            <dd class="truncate text-sm font-medium text-gray-900 dark:text-gray-100">2155465654 hgjh</dd>
                        </div>
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-xs text-gray-500 dark:text-gray-400">NUPTK</dt>
                            <dd class="truncate text-sm font-medium text-gray-900 dark:text-gray-100">321565462</dd>
                        </div>
                    </dl>

                    <div class="mt-6 grid grid-cols-2 gap-2">
                        <a href="mailto:trx@telkomuniversity.ac.id"
                            class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                            📧 <span class="group-hover:underline">Email Institusi</span>
                        </a>
                        <a href="tel:0895263241235"
                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                            📱 <span>Telepon</span>
                        </a>
                    </div>
                </div>
            </section>

            {{-- Right column: details --}}
            <section class="lg:col-span-2 space-y-6">
                {{-- Section: Data Personal --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-sm font-semibold tracking-wide text-gray-900 dark:text-gray-100">Data Personal</h3>
                    </div>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Gelar Depan</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">Sarjana Teknik (S.T.)</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Gelar Belakang</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">Magister Teknik (S.T)</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Tempat Lahir</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">Surabaya</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Tanggal Lahir</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">25 Maret 2000</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Alamat</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">Jl. Kenangan Barat</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Jenis Kelamin</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">Laki-laki</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">No Handphone</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">0895263241235</dd>
                        </div>
                    </dl>
                </div>

                {{-- Section: Kontak --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-sm font-semibold tracking-wide text-gray-900 dark:text-gray-100">Kontak</h3>
                    </div>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Email Institusi</dt>
                            <dd class="mt-1 flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                <a href="mailto:trx@telkomuniversity.ac.id"
                                    class="hover:underline">trx@telkomuniversity.ac.id</a>
                                <button type="button"
                                    class="ml-1 rounded-md border border-gray-300 px-1.5 py-0.5 text-[10px] text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800"
                                    onclick="navigator.clipboard.writeText('trx@telkomuniversity.ac.id')">Salin</button>
                            </dd>
                        </div>
                        <div>
                            <dt class="flex items-center gap-2 text-xs text-gray-600 dark:text-gray-300">
                                Email Pribadi
                                <span
                                    class="inline-flex items-center rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-medium text-red-700 ring-1 ring-inset ring-red-200 dark:bg-red-950/40 dark:text-red-200 dark:ring-red-900">
                                    Belum terverifikasi
                                </span>
                            </dt>

                            <dd class="mt-1 flex items-center gap-2 text-sm font-medium text-gray-900 dark:text-gray-100">
                                <a href="mailto:trx@gmail.com" class="hover:underline">trx@gmail.com</a>
                                <button type="button"
                                    class="ml-1 rounded-md border border-gray-300 px-1.5 py-0.5 text-[10px] text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800"
                                    onclick="navigator.clipboard.writeText('trx@gmail.com')">Salin</button>
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- Section: Status Kepegawaian --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="text-sm font-semibold tracking-wide text-gray-900 dark:text-gray-100">Status Kepegawaian
                        </h3>
                    </div>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Tanggal Bergabung</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">23 Februari 2025</dd>
                        </div>
                        <div>
                            <dt class="text-xs text-gray-500 dark:text-gray-400">Tanggal Berhenti</dt>
                            <dd class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-100">-</dd>
                        </div>
                    </dl>
                </div>

                {{-- Section: Catatan (optional) --}}
                <div
                    class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-5 text-sm text-gray-600 dark:border-gray-800 dark:bg-gray-900/40 dark:text-gray-300">
                    <p>Tip: Gunakan tombol <span
                            class="rounded bg-gray-200 px-1 py-0.5 text-[11px] dark:bg-gray-800">Salin</span> untuk cepat
                        menyalin email. Klik <span
                            class="rounded bg-blue-100 px-1 py-0.5 text-[11px] text-blue-700 dark:bg-blue-950/40 dark:text-blue-200">Ubah
                            Data</span> untuk memperbarui informasi.</p>
                </div>
            </section>
        </div>
    </div>
    <div class="w-full space-y-6">
        {{-- Header --}}
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-2xl font-semibold text-gray-900">Employee Information</h2>

            <div class="flex">
                <a href="#"
                    class="inline-flex items-center gap-2 rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-800">
                    ✏️ <span>Ubah Data</span>
                </a>
            </div>
        </div>

        {{-- Card --}}
        <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm">
            <dl class="grid grid-cols-1 gap-x-8 gap-y-5 sm:grid-cols-2">
                <div>
                    <dt class="text-xs font-medium text-gray-500">Nomor Induk Pegawai (NIP)</dt>
                    <dd class="mt-1 text-sm font-semibold text-gray-900">123165465421</dd>
                </div>

                <div>
                    <dt class="text-xs font-medium text-gray-500">Jenis Kepegawaian</dt>
                    <dd class="mt-1">
                        <span
                            class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-[11px] font-medium text-blue-700 ring-1 ring-inset ring-blue-200">
                            TPA
                        </span>
                    </dd>
                </div>

                <div>
                    <dt class="text-xs font-medium text-gray-500">Status Kepegawaian</dt>
                    <dd class="mt-1">
                        <span
                            class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-medium text-emerald-700 ring-1 ring-inset ring-emerald-200">
                            Pegawai Tetap
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
