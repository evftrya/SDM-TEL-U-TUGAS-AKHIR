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
                    Tambah Sertifikasi Dosen
                </span>
            </div>
        </div>
    </div>
@endsection

@section('content-base')
    <x-form route="{{ route('manage.sertifikasi-dosen.store') }}" cancelRoute="{{ route('manage.sertifikasi-dosen.list') }}"
        id="sertifikasi-input">
        <div class="flex flex-col gap-8 w-full max-w-100 mx-auto rounded-md border p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Sertifikasi Dosen</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex flex-col gap-4">
                    <x-islc lbl="Dosen" nm="dosen_id" required>
                        <option value="">Pilih Dosen</option>
                        @foreach ($dosens as $dosen)
                            <option value="{{ $dosen->id }}">
                                {{ $dosen->pegawai->nama_lengkap ?? '-' }} ({{ $dosen->nidn }})
                            </option>
                        @endforeach
                    </x-islc>

                    <x-itxt lbl="Nomor Registrasi" plc="1234567890" nm="nomor_registrasi" max="50"></x-itxt>
                </div>

                <div class="flex flex-col gap-4">
                    <x-itxt lbl="No SK" plc="SK/001/2024" nm="no_sk" max="100"></x-itxt>

                    <x-itxt type="date" lbl="Tanggal SK" nm="tanggal_sk"></x-itxt>
                </div>
            </div>
        </div>
    </x-form>
@endsection
