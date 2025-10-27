@php
    $active_sidebar = 'Daftar Formasi';
@endphp
@extends('kelola_data.base')
@section('header-base')
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <!-- OrgChart.js -->
    <script src="https://balkan.app/js/OrgChart.js"></script>
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
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar Formasi</span>
            </div><span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda
                dapat melihat semua formasi yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">


            <x-print-tb target_id="formasiTable"></x-print-tb>
            <x-export-csv-tb target_id="formasiTable"></x-export-csv-tb>

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


        <x-tb id="formasiTable">
            <x-slot:table_header>
                <x-tb-td nama="nama" sorting=true>Level</x-tb-td>
                <x-tb-td type="select" nama="gender" sorting=true>Nama Formasi</x-tb-td>
                <x-tb-td nama="hp" sorting=true>Tipe Bagian</x-tb-td>
                <x-tb-td nama="tipe" sorting=true>Bagian</x-tb-td>
                <x-tb-td type="select" nama="status" sorting=true>Atasan</x-tb-td>
                <x-tb-td type="select" nama="aktif" sorting=true>Kuota</x-tb-td>
                <x-tb-td nama="email_pribadi" sorting=true>Action</x-tb-td>
            </x-slot:table_header>

            <x-slot:table_column>
                <x-tb-cl id="1">
                    <x-tb-cl-fill>Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill>Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill>0</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl id="2">
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>3</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl id="3">
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>2</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill>Wakil Direktur</x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill></x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>4</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Bagian</x-tb-cl-fill>
                    <x-tb-cl-fill>KABAG Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>2</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Urusan</x-tb-cl-fill>
                    <x-tb-cl-fill>KAUR Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>5</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Anggota Bagian</x-tb-cl-fill>
                    <x-tb-cl-fill>Anggota Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>Keuangan</x-tb-cl-fill>
                    <x-tb-cl-fill>6</x-tb-cl-fill>
                    <x-tb-cl-fill>6</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Bagian</x-tb-cl-fill>
                    <x-tb-cl-fill>KABAG SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>2</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Urusan</x-tb-cl-fill>
                    <x-tb-cl-fill>KAUR SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>8</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Anggota Bagian</x-tb-cl-fill>
                    <x-tb-cl-fill>Anggota SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>Divisi</x-tb-cl-fill>
                    <x-tb-cl-fill>SDM</x-tb-cl-fill>
                    <x-tb-cl-fill>9</x-tb-cl-fill>
                    <x-tb-cl-fill>6</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                

                <x-tb-cl id="7">
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Teknik Informatika</x-tb-cl-fill>
                    <x-tb-cl-fill>4</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl id="8">
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Fakultas</x-tb-cl-fill>
                    <x-tb-cl-fill>Informatika</x-tb-cl-fill>
                    <x-tb-cl-fill>4</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl id="9">
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                    <x-tb-cl-fill>Fakultas</x-tb-cl-fill>
                    <x-tb-cl-fill>Bisnis</x-tb-cl-fill>
                    <x-tb-cl-fill>4</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>

                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Kaprodi Rekayasa Perangkat Lunak</x-tb-cl-fill>
                    <x-tb-cl-fill>Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Rekayasa Perangkat Lunak</x-tb-cl-fill>
                    <x-tb-cl-fill>12</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>
                <x-tb-cl>
                    <x-tb-cl-fill>Anggota Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Anggota Prodi RPL</x-tb-cl-fill>
                    <x-tb-cl-fill>Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Rekayasa Perangkat Lunak</x-tb-cl-fill>
                    <x-tb-cl-fill>14</x-tb-cl-fill>
                    <x-tb-cl-fill>8</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>
                <x-tb-cl>
                    <x-tb-cl-fill>Kepala Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Kaprodi Sistem Informasi</x-tb-cl-fill>
                    <x-tb-cl-fill>Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Rekayasa Sistem Informasi</x-tb-cl-fill>
                    <x-tb-cl-fill>12</x-tb-cl-fill>
                    <x-tb-cl-fill>1</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>
                <x-tb-cl>
                    <x-tb-cl-fill>Anggota Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Anggota Prodi SI</x-tb-cl-fill>
                    <x-tb-cl-fill>Program Studi</x-tb-cl-fill>
                    <x-tb-cl-fill>Rekayasa Sistem Informasi</x-tb-cl-fill>
                    <x-tb-cl-fill>16</x-tb-cl-fill>
                    <x-tb-cl-fill>8</x-tb-cl-fill>
                    <x-tb-cl-fill>
                        <div class="flex items-center justify-center gap-3">
                            
                            <button
                                class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                View Details
                            </button>
                        </div>
                    </x-tb-cl-fill>
                </x-tb-cl>
            </x-slot:table_column>
        </x-tb>





    </div>







    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));
        });
    </script>
@endsection
