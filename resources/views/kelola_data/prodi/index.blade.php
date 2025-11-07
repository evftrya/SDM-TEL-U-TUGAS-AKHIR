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

        /* Expandable Row Styles */
        .expand-row {
            display: none;
            background-color: #f9fafb;
        }

        .expand-row.show {
            display: table-row;
        }

        .detail-section {
            background: white;
            padding: 12px 16px;
            margin: 0;
            border-top: 1px solid #e5e7eb;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 8px;
            margin-top: 8px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            padding: 6px 8px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-left: 2px solid #6b7280;
        }

        .detail-item .icon {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 8px;
            font-size: 14px;
            background: #f3f4f6;
            color: #6b7280;
        }

        .rotate-icon {
            transition: transform 0.3s ease;
        }

        .rotate-icon.rotated {
            transform: rotate(180deg);
        }

        /* Button Styles */
        .btn-expand {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: #6b7280;
            color: white;
            font-size: 11px;
            font-weight: 500;
            transition: background 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-expand:hover {
            background: #4b5563;
        }
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar Program Studi</span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Anda dapat melihat semua program studi yang terdaftar di sistem disini
            </span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <button id="openCreateModal" type="button" class="flex rounded-[5.874740123748779px]">
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
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex flex-grow-0 flex-col gap-2 max-w-100">
        <x-tb id="prodiTable">
            <x-slot:put_something>
                <x-print-tb target_id="prodiTable"></x-print-tb>
                <x-export-csv-tb target_id="prodiTable"></x-export-csv-tb>
            </x-slot:put_something>
            <x-slot:table_header>
                {{-- <x-tb-td nama="kode">Kode</x-tb-td> --}}
                <x-tb-td nama="nama">Nama Program Studi</x-tb-td>
                <x-tb-td nama="fakultas">Fakultas</x-tb-td>
                <x-tb-td nama="action">Action</x-tb-td>
            </x-slot:table_header>
            <x-slot:table_column>
                @forelse ($prodis as $index => $prodi)
                    <x-tb-cl id="{{ $prodi->id }}">
                        <x-tb-cl-fill>{{ $prodi->nama_prodi }}</x-tb-cl-fill>
                        <x-tb-cl-fill>{{ $prodi->fakultas->nama_fakultas ?? '-' }}</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- Edit Button -->
                                <a href="{{ route('manage.prodi.edit', $prodi->id) }}" data-bs-container="body"
                                    data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover"
                                    data-bs-content="Edit Program Studi"
                                    class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] bg-white hover:bg-[#f9fafb] transition duration-150 ease-in-out">
                                    <i class="bi bi-pencil text-[#0070ff] text-[14px]"></i>
                                </a>

<<<<<<< HEAD
                                <!-- View Details Button -->
                                <button type="button"
                                    onclick="openDetailModal({{ $prodi->id }}, '{{ addslashes($prodi->nama_prodi) }}', '{{ addslashes($prodi->fakultas->nama_fakultas) }}')"
                                    class="px-3 py-1.5 border border-[#1C2762] text-[#1C2762] rounded-md text-xs font-medium hover:bg-[#1C2762] hover:text-white transition duration-200">
                                    View Details
=======
            <table id="rekapTable" class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border">
                            No.</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border">
                            Prodi</th>
                        <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">
                            Total Dosen</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($prodiStats as $index => $stat)
                        <!-- Baris utama -->
                        <tr class="hover:bg-gray-50">
                            <td class="px-3 py-3 text-center border">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-left border">
                                <div class="font-medium text-gray-900">{{ $stat['nama_prodi'] }}</div>
                                <div class="text-xs text-gray-500">{{ $stat['fakultas'] }}</div>
                            </td>
                            <td class="px-3 py-3 text-center border font-semibold">{{ $stat['total_dosen'] }}</td>
                            <td class="px-4 py-3 text-center border">
                                <div class="flex gap-2 justify-center">
                                    <button onclick="toggleDetail('{{ $stat['id'] }}')" id="btn-{{ $stat['id'] }}"
                                        class="btn-expand">
                                        <i class="bi bi-chevron-down rotate-icon" id="icon-{{ $stat['id'] }}"></i>
                                        Detail
                                    </button>
                                    <a href="{{ route('manage.prodi.edit', $stat['id']) }}"
                                        class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit Prodi
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Baris detail (expandable) -->
                        <tr id="detail-{{ $stat['id'] }}" class="expand-row">
                            <td colspan="4" class="p-0">
                                <div class="detail-section">
                                    <!-- Pendidikan Section -->
                                    <div class="mb-3">
                                        <h4
                                            class="text-xs font-semibold text-gray-600 mb-2 pb-1 border-b flex items-center gap-1">
                                            <i class="bi bi-mortarboard-fill text-gray-600 text-sm"></i>
                                            Jenjang Pendidikan
                                        </h4>
                                        <div class="detail-grid">
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-book"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">S2 (Magister)</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['s2'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-book-fill"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">S3 (Doktor)</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['s3'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-percent"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Persentase S3</div>
                                                    <div class="text-sm font-semibold text-gray-700">
                                                        {{ number_format($stat['persen_s3'] * 100, 2) }}%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Jabatan Fungsional Section -->
                                    <div class="mb-3">
                                        <h4
                                            class="text-xs font-semibold text-gray-600 mb-2 pb-1 border-b flex items-center gap-1">
                                            <i class="bi bi-award-fill text-gray-600 text-sm"></i>
                                            Jabatan Fungsional Akademik
                                        </h4>
                                        <div class="detail-grid">
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Non-JFA Dosen</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['njad'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-star"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Asisten Ahli</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['aa'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-star-fill"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Lektor</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['l'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-stars"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Lektor Kepala</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['lk'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-trophy-fill"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Guru Besar</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['gb'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-graph-up"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Proporsi L+LK+GB</div>
                                                    <div class="text-sm font-semibold text-gray-700">
                                                        {{ number_format($stat['llkgb'] * 100, 2) }}%</div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-graph-up-arrow"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Proporsi JFA</div>
                                                    <div class="text-sm font-semibold text-gray-700">
                                                        {{ number_format($stat['jfa'] * 100, 2) }}%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Status Kepegawaian Section -->
                                    <div>
                                        <h4
                                            class="text-xs font-semibold text-gray-600 mb-2 pb-1 border-b flex items-center gap-1">
                                            <i class="bi bi-person-badge-fill text-gray-600 text-sm"></i>
                                            Status Kepegawaian
                                        </h4>
                                        <div class="detail-grid">
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-check-circle-fill"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Tetap</div>
                                                    <div class="text-sm font-semibold text-gray-900">{{ $stat['tetap'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-clock-history"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Calon Tetap</div>
                                                    <div class="text-sm font-semibold text-gray-900">
                                                        {{ $stat['calon_tetap'] }}</div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-briefcase-fill"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Profesional</div>
                                                    <div class="text-sm font-semibold text-gray-900">
                                                        {{ $stat['profesional'] }}</div>
                                                </div>
                                            </div>
                                            <div class="detail-item">
                                                <div class="icon">
                                                    <i class="bi bi-arrows-move"></i>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="text-xs text-gray-500">Perbantuan</div>
                                                    <div class="text-sm font-semibold text-gray-900">
                                                        {{ $stat['perbantuan'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="mt-4 pt-3 border-t flex justify-end">
                                        <button onclick="editProdi('{{ $stat['id'] }}')"
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-500 text-white text-sm font-medium hover:bg-yellow-600 transition">
                                            <i class="bi bi-pencil-square"></i>
                                            Edit Statistik Dosen
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                                Belum ada data program studi
                            </td>
                        </tr>
                    @endforelse

                    @if ($prodiStats->count() > 0)
                        <!-- Baris Total -->
                        <tr class="bg-gray-100 font-bold border-t-2 border-gray-300">
                            <td colspan="2" class="px-4 py-3 text-center border">TOTAL</td>
                            <td class="px-3 py-3 text-center border">{{ $totals['total_dosen'] }}</td>
                            <td class="px-4 py-3 text-center border">
                                <button onclick="toggleAllDetails()" class="btn-expand">
                                    <i class="bi bi-eye"></i>
                                    Lihat Semua
>>>>>>> d8eafca (fix)
                                </button>

                                <!-- Delete Button -->
                                <button type="button"
                                    onclick="openDeleteProdiModal({{ $prodi->id }}, '{{ addslashes($prodi->nama_prodi) }}', '{{ route('manage.prodi.destroy', $prodi->id) }}')"
                                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                    data-bs-trigger="hover" data-bs-content="Hapus Program Studi"
                                    class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] bg-white hover:bg-red-50 transition duration-150 ease-in-out">
                                    <i class="bi bi-trash text-red-600 text-[14px]"></i>
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">
                            Belum ada data program studi
                        </td>
                    </tr>
                @endforelse
            </x-slot:table_column>
        </x-tb>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $prodis->links('vendor.pagination.custom') }}
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));
        });
    </script>

<<<<<<< HEAD
=======
    <!-- Modal Edit Statistik Prodi -->
    <div id="editStatsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50"
        onclick="closeEditModal(event)">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-2/3 shadow-lg rounded-lg bg-white"
            onclick="event.stopPropagation()">
            <!-- Modal Header -->
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="text-xl font-semibold text-gray-900 flex items-center gap-2">
                    <i class="bi bi-pencil-square text-gray-700"></i>
                    Edit Statistik Dosen - <span id="editProdiName" class="text-gray-700"></span>
                </h3>
                <button onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition">
                    <i class="bi bi-x-lg text-2xl"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <form id="editStatsForm" onsubmit="saveStats(event)" class="mt-4">
                <input type="hidden" id="editProdiId" name="prodi_id">
                <!-- Status Kepegawaian Section -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-md font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="bi bi-person-badge-fill"></i>
                        Status Kepegawaian
                    </h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-check-circle-fill"></i> Tetap
                            </label>
                            <input type="number" name="tetap" id="edit_tetap" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-clock-history"></i> Calon Tetap
                            </label>
                            <input type="number" name="calon_tetap" id="edit_calon_tetap" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-briefcase-fill"></i> Profesional
                            </label>
                            <input type="number" name="profesional" id="edit_profesional" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-arrows-move"></i> Perbantuan
                            </label>
                            <input type="number" name="perbantuan" id="edit_perbantuan" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                    </div>
                </div>
                <!-- Pendidikan Section -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-md font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="bi bi-mortarboard-fill"></i>
                        Pendidikan
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-book"></i> S2 (Magister)
                            </label>
                            <input type="number" name="s2" id="edit_s2" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-book-fill"></i> S3 (Doktor)
                            </label>
                            <input type="number" name="s3" id="edit_s3" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-percent"></i> Persentase S3 (Auto)
                            </label>
                            <input type="text" id="edit_persen_s3" readonly
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100"
                                placeholder="Otomatis">
                        </div>
                    </div>
                </div>

                <!-- Jabatan Fungsional Section -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-md font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <i class="bi bi-award-fill"></i>
                        Jabatan Fungsional Akademik
                    </h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-person"></i> Non-JFA
                            </label>
                            <input type="number" name="njad" id="edit_njad" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-star"></i> Asisten Ahli
                            </label>
                            <input type="number" name="aa" id="edit_aa" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-star-fill"></i> Lektor
                            </label>
                            <input type="number" name="l" id="edit_l" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-stars"></i> Lektor Kepala
                            </label>
                            <input type="number" name="lk" id="edit_lk" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-trophy-fill"></i> Guru Besar
                            </label>
                            <input type="number" name="gb" id="edit_gb" min="0"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent"
                                required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-graph-up"></i> LLKGB (Auto)
                            </label>
                            <input type="text" id="edit_llkgb" readonly
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100"
                                placeholder="Otomatis">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="bi bi-graph-up-arrow"></i> JFA (Auto)
                            </label>
                            <input type="text" id="edit_jfa" readonly
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-100"
                                placeholder="Otomatis">
                        </div>
                    </div>
                </div>



                <!-- Summary -->
                <div class="p-4 bg-gray-100 rounded-lg border border-gray-300 mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-gray-700">
                            <i class="bi bi-people-fill"></i> Total Dosen (Auto):
                        </span>
                        <span id="edit_total_dosen" class="text-lg font-bold text-blue-600">0</span>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t">
                    <button type="button" onclick="closeEditModal()"
                        class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

>>>>>>> d8eafca (fix)
    <!-- Include Create Modal -->
    @include('kelola_data.prodi.create')

    <!-- Include Detail Modal -->
    @include('kelola_data.prodi.show')

    <!-- Include Delete Modal -->
    @include('kelola_data.prodi.delete')
@endsection
