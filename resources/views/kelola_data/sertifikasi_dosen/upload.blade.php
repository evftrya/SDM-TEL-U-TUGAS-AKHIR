@php
    $active_sidebar = 'Sertifikasi Dosen';
@endphp

@extends('kelola_data.base')

@section('header-base')
    <style>
        .max-w-100 {
            max-width: 100% !important;
        }
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">
                    Upload Sertifikasi Dosen
                </span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Upload file Excel untuk import data sertifikasi dosen
            </span>
        </div>
    </div>
@endsection

@section('content-base')
    <x-form route="{{ route('manage.sertifikasi-dosen.process-upload') }}" enctype="multipart/form-data"
        cancelRoute="{{ route('manage.sertifikasi-dosen.list') }}" id="sertifikasi-upload">
        <div class="flex flex-col gap-8 w-full max-w-100 mx-auto rounded-md border p-3">
            <h2 class="text-lg font-semibold text-black text-center">Upload File Excel</h2>

            <div class="flex flex-col gap-4">
                <div class="p-4 bg-blue-50 border border-blue-200 rounded">
                    <p class="text-sm text-blue-800">
                        <strong>Format File:</strong> File Excel (.xlsx, .xls) atau CSV (.csv) dengan kolom:
                    </p>
                    <ul class="list-disc list-inside text-sm text-blue-700 mt-2">
                        <li>NIDN</li>
                        <li>Nomor Registrasi</li>
                        <li>No SK</li>
                        <li>Tanggal SK (format: DD/MM/YYYY)</li>
                    </ul>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-medium text-gray-700">Pilih File</label>
                    <input type="file" name="file" accept=".xlsx,.xls,.csv" required
                        class="px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>
    </x-form>
@endsection
