@php
    $active_sidebar = 'Daftar Pegawai';
@endphp
@extends('kelola_data.base')
@section('header-base')
    <style>
        .max-w-100 {
            max-width: 100% !important;
        }



        .nav-active {
            background-color: #0070ff;

            span {
                color: white;
            }
        }
    </style>

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
@endsection
@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch"><span
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar
                    Kontak Darurat <section class="font-bold my-3">Pegawai AlisHA</section></span>
            </div><span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda
                dapat
                melihat semua kontak darurat milik pegawai  yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">

            {{-- <x-print-tb target_id="pegawaiTable"></x-print-tb> --}}
            <x-export-csv-tb target_id="pegawaiTable"></x-export-csv-tb>

            <button class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-[#0070ff] px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#0070ff] hover:bg-[#005fe0] transition">
                    <i class="bi bi-plus text-sm text-white"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-white">Tambah</span>
                </div>
            </button>
        </div>

    </div>
@endsection
@section('content-base')
    <div class="flex flex-grow-0 flex-col gap-2 max-w-100">


        <x-tb id="pegawaiTable">
            <x-slot:table_header>
                <x-tb-td nama="nama" sorting=true>Nama Kontak Darurat</x-tb-td>
                <x-tb-td type="select" nama="gender" sorting=true>Hubungan Dengan User</x-tb-td>
                <x-tb-td nama="nip" sorting=true>Telepon</x-tb-td>
                <x-tb-td nama="nik" sorting=true>Email</x-tb-td>
                <x-tb-td nama="hp" sorting=true>Alamat</x-tb-td>
            </x-slot:table_header>
            <x-slot:table_column>
                {{-- <x-tb-cl-fill>jskhjdasljkhDkj</x-tb-cl-fill> --}}
                <x-tb-cl-fill>Ortu</x-tb-cl-fill>
                <x-tb-cl-fill>Ortu</x-tb-cl-fill>
                <x-tb-cl-fill>Ortu</x-tb-cl-fill>
                <x-tb-cl-fill>0897465456564</x-tb-cl-fill>
                <x-tb-cl-fill>esjjdhf@rkfjd.com</x-tb-cl-fill>
                <x-tb-cl-fill>
                    <div class="text-wrap">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos sint quasi similique rem, nihil laborum vel inventore blanditiis omnis, quisquam dolorem iste officiis ea provident delectus vitae nesciunt neque architecto.
                    </div>
                </x-tb-cl-fill>

            </x-slot:table_column>
        </x-tb>


    </div>




    @include('kelola_data.pegawai.js.active-and-nonactive-pegawai')
    @include('kelola_data.pegawai.js.alert-success-from-controller')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));
        });
    </script>
@endsection
