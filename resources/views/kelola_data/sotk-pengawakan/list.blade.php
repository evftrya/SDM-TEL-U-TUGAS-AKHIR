@php
    $active_sidebar = 'Daftar Pengawakan';
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
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar Pengawakan</span>
            </div><span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda
                dapat melihat semua formasi yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">


            <x-print-tb target_id="PengawakanTable"></x-print-tb>
            <x-export-csv-tb target_id="PengawakanTable"></x-export-csv-tb>

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

        @php
            $pengawakan = [
                // Direktur (1)
                ['Andi Pratama', 'Direktur', '2020-03-15', '2027-06-20', 'SK-001/DIR/2020', ''],

                // Wakil Direktur (3)
                ['Rina Kurniawati', 'Wakil Direktur', '2020-05-01', '2028-01-30', 'SK-002/WADIR/2020', ''],
                ['Budi Santoso', 'Wakil Direktur', '2020-02-12', '2026-11-09', 'SK-003/WADIR/2020', ''],
                ['Mega Handayani', 'Wakil Direktur', '2020-09-10', '2027-08-22', 'SK-004/WADIR/2020', ''],

                // KABAG Keuangan (1)
                ['Dewi Anggraini', 'KABAG Keuangan', '2020-07-04', '2026-09-18', 'SK-005/KEU/2020', ''],

                // KAUR Keuangan (1)
                ['Hendra Gunawan', 'KAUR Keuangan', '2020-10-25', '2027-03-12', 'SK-006/KAURKEU/2020', ''],

                // Anggota Keuangan (6)
                ['Fitri Maulida', 'Anggota Keuangan', '2020-04-02', '2026-10-05', 'SK-007/ANGKEU/2020', 'Ya'],
                ['Rizky Ramadhan', 'Anggota Keuangan', '2020-06-18', '2027-07-09', 'SK-008/ANGKEU/2020', 'Ya'],
                ['Sinta Wulandari', 'Anggota Keuangan', '2020-11-13', '2028-02-15', 'SK-009/ANGKEU/2020', 'Ya'],
                ['Yusuf Ibrahim', 'Anggota Keuangan', '2020-01-20', '2026-12-01', 'SK-010/ANGKEU/2020', 'Ya'],
                ['Lia Septiani', 'Anggota Keuangan', '2020-08-11', '2027-04-30', 'SK-011/ANGKEU/2020', 'Ya'],
                ['Arif Nugroho', 'Anggota Keuangan', '2020-09-25', '2028-05-17', 'SK-012/ANGKEU/2020', 'Ya'],

                // KABAG SDM (1)
                ['Nur Aisyah', 'KABAG SDM', '2020-02-05', '2026-11-15', 'SK-013/SDM/2020', ''],

                // KAUR SDM (1)
                ['Fauzan Hidayat', 'KAUR SDM', '2020-06-07', '2028-07-19', 'SK-014/KAURSDM/2020', ''],

                // Anggota SDM (6)
                ['Tasya Amelia', 'Anggota SDM', '2020-03-23', '2027-01-09', 'SK-015/ANGSDM/2020', 'Ya'],
                ['Rizal Akbar', 'Anggota SDM', '2020-10-02', '2028-03-11', 'SK-016/ANGSDM/2020', 'Ya'],
                ['Ayu Fitria', 'Anggota SDM', '2020-04-21', '2026-08-12', 'SK-017/ANGSDM/2020', 'Ya'],
                ['Dedi Mulyana', 'Anggota SDM', '2020-09-05', '2028-05-28', 'SK-018/ANGSDM/2020', 'Ya'],
                ['Yuni Marlina', 'Anggota SDM', '2020-05-09', '2027-02-17', 'SK-019/ANGSDM/2020', 'Ya'],
                ['Hafiz Rahman', 'Anggota SDM', '2020-01-19', '2026-10-23', 'SK-020/ANGSDM/2020', 'Ya'],
            ];
        @endphp

        <x-tb id="PengawakanTable">
            <x-slot:table_header>
                <x-tb-td nama="nama" sorting=true>Nama Pegawai</x-tb-td>
                <x-tb-td type="select" nama="gender" sorting=true>Formasi</x-tb-td>
                <x-tb-td nama="tmt_mulai" sorting=true>TMT Mulai</x-tb-td>
                <x-tb-td nama="tmt_selesai" sorting=true>TMT Selesai</x-tb-td>
                <x-tb-td nama="sk" sorting=true>NO. SK</x-tb-td>
                <x-tb-td type="select" nama="aktif" sorting=true>Nonaktifkan</x-tb-td>
                <x-tb-td nama="email_pribadi" sorting=true>Action</x-tb-td>
            </x-slot:table_header>

            <x-slot:table_column>
                @foreach ($pengawakan as $row)
                <x-tb-cl :cls="$row[5] !== '' ? 'opacity-45' : ''">

                    <x-tb-cl @if ($row[5]!=='') cls="opacity-45" @endif>
                        <x-tb-cl-fill><?= htmlspecialchars($row[0]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill><?= htmlspecialchars($row[1]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill><?= htmlspecialchars($row[2]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill :cls="$row[5] === '' ? 'text-white' : ''"><?= htmlspecialchars($row[3]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill><?= htmlspecialchars($row[4]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill><?= htmlspecialchars($row[5]) ?></x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition">
                                    View
                                </button>
                                @if ($row[5] === '')
                                <button
                                    class="px-3 py-1.5 border border-rose-600 text-rose-600 rounded-md text-xs font-medium hover:bg-rose-600 hover:text-white transition">
                                    Nonaktifkan
                                </button>
                                @endif
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                @endforeach
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
