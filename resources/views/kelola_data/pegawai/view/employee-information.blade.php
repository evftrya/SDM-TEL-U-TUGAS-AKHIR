@php
    $active_sidebar = 'Employee Information';
@endphp

@extends('kelola_data.base-profile')

@section('content-profile')
<div class="w-full space-y-6">
    {{-- Header --}}
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-2xl font-semibold text-gray-900">Employee Information</h2>

        <div class="flex">
            <a
                href="#"
                class="inline-flex items-center gap-2 rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 active:bg-blue-800"
            >
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
                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-[11px] font-medium text-blue-700 ring-1 ring-inset ring-blue-200">
                        TPA
                    </span>
                </dd>
            </div>

            <div>
                <dt class="text-xs font-medium text-gray-500">Status Kepegawaian</dt>
                <dd class="mt-1">
                    <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-[11px] font-medium text-emerald-700 ring-1 ring-inset ring-emerald-200">
                        Pegawai Tetap
                    </span>
                </dd>
            </div>
        </dl>
    </div>
</div>
@endsection
