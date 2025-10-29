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
@endsection
@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch"><span
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar
                    Pegawai {{ $send[0] == 'All' ? null : $send[0] }}</span>
            </div><span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda
                dapat
                melihat semua pegawai yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">

            <x-print-tb target_id="pegawaiTable"></x-print-tb>
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
        <div class="flex items-center gap-[3.7518811225891113px]">
            <a href="{{ route('manage.pegawai.list', ['destination' => 'All']) }}"
                class="h-[17.508777618408203px] {{ $send[0] == 'All' ? 'nav-active' : null }} flex justify-center items-center gap-[6.253134727478027px] p-[6.253134727478027px] rounded-tl-[1.8759405612945557px] rounded-tr-[1.8759405612945557px]">
                <span class="font-semibold text-xs text-center text-[#1c2762]">Semua</span>
            </a>
            <a href="{{ route('manage.pegawai.list', ['destination' => 'Tpa']) }}"
                class="h-[17.508777618408203px] {{ $send[0] == 'Tpa' ? 'nav-active' : null }} flex justify-center items-center gap-[6.253134727478027px] p-[6.253134727478027px]">
                <span class="font-semibold text-xs text-center text-[#1c2762]">TPA</span>
            </a>
            <a href="{{ route('manage.pegawai.list', ['destination' => 'Dosen']) }}"
                class="h-[17.508777618408203px] {{ $send[0] == 'Dosen' ? 'nav-active' : null }} flex justify-center items-center gap-[6.253134727478027px] p-[6.253134727478027px]">
                <span class="font-semibold text-xs text-center text-[#1c2762]">Dosen</span>
            </a>
        </div>


        <x-tb id="pegawaiTable">
            <x-slot:table_header>
                <x-tb-td nama="nama" sorting=true>Nama Lengkap</x-tb-td>
                <x-tb-td type="select" nama="gender" sorting=true>Gender</x-tb-td>
                <x-tb-td nama="hp" sorting=true>No. HP</x-tb-td>
                <x-tb-td type="{{ $send[0] == 'All' ? 'select' : null }}" nama="tipe" sorting=true>Tipe Pegawai</x-tb-td>
                <x-tb-td type="select" nama="status" sorting=true>Status</x-tb-td>
                <x-tb-td type="select" nama="aktif" sorting=true>Is Active</x-tb-td>
                <x-tb-td nama="email_pribadi" sorting=true>Email Pribadi</x-tb-td>
                <x-tb-td nama="email_institusi" sorting=true>Email Institusi</x-tb-td>
                <x-tb-td nama="action" sorting=true>Action</x-tb-td>
            </x-slot:table_header>
            <x-slot:table_column>
                @foreach ($users as $user)
                    @if ($user['id'] != session('account')['id'])
                        <x-tb-cl id="$i">
                            <x-tb-cl-fill>
                                {{ $user['nama_lengkap'] }}
                            </x-tb-cl-fill>
                            <x-tb-cl-fill>{{ $user['jenis_kelamin'] }}</x-tb-cl-fill>
                            <x-tb-cl-fill>{{ $user['telepon'] }}</x-tb-cl-fill>
                            <x-tb-cl-fill>TPA</x-tb-cl-fill>
                            <x-tb-cl-fill>Pegawai Tetap</x-tb-cl-fill>
                            <x-tb-cl-fill>
                                    @if ($user['is_active'] == true)

                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                                @else
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Nonactive
                                </span>
                                @endif

                            </x-tb-cl-fill>
                            <x-tb-cl-fill>{{ $user['email_pribadi'] }}</x-tb-cl-fill>
                            <x-tb-cl-fill>{{ $user['email_institusi'] }}</x-tb-cl-fill>
                            <x-tb-cl-fill>
                                <div class="flex items-center justify-center gap-3">
                                    <!-- WhatsApp Button -->
                                    <!-- WhatsApp Button dengan Popover -->
                                    <a href="https://wa.me/62{{ $user['telepon'] }}" target="_blank"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                        data-bs-trigger="hover" data-bs-content="Hubungi lewat WhatsApp 📱"
                                        class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] bg-white hover:bg-[#f9fafb] transition duration-150 ease-in-out">
                                        <i class="bi bi-whatsapp text-[#25D366] text-[16px]"></i>
                                    </a>
                                    @if ($user['is_active'] == true)
                                        <form id="form-nonaktif-{{ $user['id'] }}"
                                            action="{{ route('manage.pegawai.set-non-active', ['idUser' => $user['id']]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            <button title="Nonaktifkan Pegawai" type="button"
                                                onclick="konfirmasiNonaktif('{{ $user['id'] }}')"
                                                class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] 
                                                bg-white text-[#10B981] hover:bg-[#FEE2E2] hover:border-[#FCA5A5] hover:text-[#EF4444]
                                            transition-all duration-200 ease-in-out shadow-sm hover:shadow-md">
                                                <i class="fa-solid fa-power-off text-[14px]"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-aktif-{{ $user['id'] }}"
                                            action="{{ route('manage.pegawai.set-active', ['idUser' => $user['id']]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            <button title="Aktifkan Pegawai" type="button"
                                                onclick="konfirmasiAktif('{{ $user['id'] }}')"
                                                class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] 
                                            bg-white text-[#EF4444] hover:bg-[#DCFCE7] hover:border-[#86EFAC] hover:text-[#10B981]
                                            transition-all duration-200 ease-in-out shadow-sm hover:shadow-md">
                                                <i class="fa-solid fa-power-off text-[14px]"></i>
                                            </button>
                                        </form>
                                    @endif


                                    <button
                                        class="px-3 py-1.5 bg-gradient-to-r from-[#2563eb] to-[#1d4ed8] text-white rounded-md text-xs font-medium 
                                        hover:from-[#1d4ed8] hover:to-[#2563eb] shadow-md hover:shadow-lg transition-all duration-300">
                                        Ubah Password
                                    </button>


                                    <a href="{{ route('manage.pegawai.view.personal-info', ['idUser' => $user['id']]) }}"
                                        class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                        View Details
                                    </a>

                                </div>
                            </x-tb-cl-fill>
                        </x-tb-cl>
                    @endif
                @endforeach
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
{{-- @section('script')
    <script src="{{ 'js/print-table' }}"></script>
@endsection --}}
