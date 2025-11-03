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

        .btn-edit {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: #9ca3af;
            color: white;
            font-size: 11px;
            font-weight: 500;
            transition: background 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-edit:hover {
            background: #6b7280;
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

    @if ($totals['total_dosen'] == 0)
        <div class="mb-4 bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded relative">
            <strong>Catatan:</strong> Tabel rekapitulasi masih kosong. Pastikan:
            <ul class="list-disc ml-5 mt-2">
                <li>Tabel <code>dosens</code> memiliki kolom <code>prodi_id</code> untuk menghubungkan dosen dengan program
                    studi</li>
                <li>Data dosen, jabatan fungsional, pendidikan, dan status kepegawaian sudah tersedia di database</li>
                <li>Tabel <code>ref_jabatan_fungsional</code> dan <code>riwayat_jabatan_fungsional</code> sudah ada di
                    database</li>
            </ul>
        </div>
    @endif

    <div class="flex flex-grow-0 flex-col gap-2 max-w-100">
        <!-- Tabel Rekapitulasi Dosen per Prodi -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-800">Rekapitulasi Dosen per Program Studi</h3>
                <div class="flex gap-2">
                    <button onclick="printTable()"
                        class="px-3 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm transition">
                        <i class="bi bi-printer"></i> Print
                    </button>
                    <button onclick="exportToCSV()"
                        class="px-3 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 text-sm transition">
                        <i class="bi bi-file-earmark-excel"></i> Export CSV
                    </button>
                </div>
            </div>

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
                                    <button onclick="editProdi('{{ $stat['id'] }}')" class="btn-edit">
                                        <i class="bi bi-pencil"></i>
                                        Edit
                                    </button>
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
                                </button>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Keterangan & Rumus -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

        <!-- Keterangan & Rumus -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Keterangan -->
            <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg shadow-sm border border-blue-200">
                <h4 class="text-sm font-bold text-blue-900 mb-3 flex items-center gap-2">
                    <i class="bi bi-info-circle-fill"></i>
                    Keterangan Singkatan
                </h4>
                <div class="grid grid-cols-2 gap-2 text-xs text-gray-700">
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>NJAD:</strong> Non-JFA Dosen
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>AA:</strong> Asisten Ahli
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>L:</strong> Lektor
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>LK:</strong> Lektor Kepala
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>GB:</strong> Guru Besar
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <strong>LLKGB:</strong> Proporsi L + LK + GB
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded col-span-2">
                        <strong>JFA:</strong> Proporsi Dosen dengan Jabatan Fungsional Akademik
                    </div>
                </div>
            </div>

            <!-- Rumus Perhitungan -->
            <div class="p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg shadow-sm border border-green-200">
                <h4 class="text-sm font-bold text-green-900 mb-3 flex items-center gap-2">
                    <i class="bi bi-calculator-fill"></i>
                    Rumus Perhitungan
                </h4>
                <div class="space-y-2 text-xs">
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <div class="font-semibold text-gray-700 mb-1">Persentase S3:</div>
                        <code class="text-xs bg-gray-100 px-2 py-1 rounded">%S3 = (S3 ÷ Total Dosen) × 100%</code>
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <div class="font-semibold text-gray-700 mb-1">Proporsi L+LK+GB:</div>
                        <code class="text-xs bg-gray-100 px-2 py-1 rounded">LLKGB = ((L + LK + GB) ÷ Total Dosen) ×
                            100%</code>
                    </div>
                    <div class="bg-white bg-opacity-70 p-2 rounded">
                        <div class="font-semibold text-gray-700 mb-1">Proporsi JFA:</div>
                        <code class="text-xs bg-gray-100 px-2 py-1 rounded">JFA = ((AA + L + LK + GB) ÷ Total Dosen) ×
                            100%</code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle detail expandable row
        function toggleDetail(prodiId) {
            const detailRow = document.getElementById('detail-' + prodiId);
            const icon = document.getElementById('icon-' + prodiId);
            const btn = document.getElementById('btn-' + prodiId);

            if (detailRow.classList.contains('show')) {
                detailRow.classList.remove('show');
                icon.classList.remove('rotated');
                btn.innerHTML = '<i class="bi bi-chevron-down rotate-icon" id="icon-' + prodiId + '"></i> Detail';
            } else {
                detailRow.classList.add('show');
                icon.classList.add('rotated');
                btn.innerHTML = '<i class="bi bi-chevron-up rotate-icon rotated" id="icon-' + prodiId + '"></i> Tutup';
            }
        }

        // Toggle all details
        function toggleAllDetails() {
            const allDetails = document.querySelectorAll('.expand-row');
            const allIcons = document.querySelectorAll('.rotate-icon');
            const hasShown = Array.from(allDetails).some(detail => detail.classList.contains('show'));

            allDetails.forEach((detail, index) => {
                if (hasShown) {
                    detail.classList.remove('show');
                } else {
                    detail.classList.add('show');
                }
            });

            allIcons.forEach(icon => {
                if (hasShown) {
                    icon.classList.remove('rotated');
                } else {
                    icon.classList.add('rotated');
                }
            });

            // Update all button texts
            const allBtns = document.querySelectorAll('[id^="btn-"]');
            allBtns.forEach(btn => {
                if (hasShown) {
                    const id = btn.id.replace('btn-', '');
                    btn.innerHTML = '<i class="bi bi-chevron-down rotate-icon" id="icon-' + id + '"></i> Detail';
                } else {
                    const id = btn.id.replace('btn-', '');
                    btn.innerHTML = '<i class="bi bi-chevron-up rotate-icon rotated" id="icon-' + id +
                        '"></i> Tutup';
                }
            });
        }

        // Edit prodi function
        function editProdi(prodiId) {
            // Get prodi data
            const prodiStats = @json($prodiStats);
            const prodi = prodiStats.find(p => p.id === prodiId);

            if (!prodi) {
                alert('Data tidak ditemukan');
                return;
            }

            // Fill modal with data
            document.getElementById('editProdiId').value = prodi.id;
            document.getElementById('editProdiName').textContent = prodi.nama_prodi;

            // Pendidikan
            document.getElementById('edit_s2').value = prodi.s2;
            document.getElementById('edit_s3').value = prodi.s3;

            // JFA
            document.getElementById('edit_njad').value = prodi.njad;
            document.getElementById('edit_aa').value = prodi.aa;
            document.getElementById('edit_l').value = prodi.l;
            document.getElementById('edit_lk').value = prodi.lk;
            document.getElementById('edit_gb').value = prodi.gb;

            // Status
            document.getElementById('edit_tetap').value = prodi.tetap;
            document.getElementById('edit_calon_tetap').value = prodi.calon_tetap;
            document.getElementById('edit_profesional').value = prodi.profesional;
            document.getElementById('edit_perbantuan').value = prodi.perbantuan;

            // Calculate auto fields
            calculateStats();

            // Show modal
            document.getElementById('editStatsModal').classList.remove('hidden');
        }

        // Close modal
        function closeEditModal(event) {
            if (event && event.target.id !== 'editStatsModal') return;
            document.getElementById('editStatsModal').classList.add('hidden');
        }

        // Calculate statistics automatically
        function calculateStats() {
            const s2 = parseInt(document.getElementById('edit_s2').value) || 0;
            const s3 = parseInt(document.getElementById('edit_s3').value) || 0;
            const njad = parseInt(document.getElementById('edit_njad').value) || 0;
            const aa = parseInt(document.getElementById('edit_aa').value) || 0;
            const l = parseInt(document.getElementById('edit_l').value) || 0;
            const lk = parseInt(document.getElementById('edit_lk').value) || 0;
            const gb = parseInt(document.getElementById('edit_gb').value) || 0;
            const tetap = parseInt(document.getElementById('edit_tetap').value) || 0;
            const calonTetap = parseInt(document.getElementById('edit_calon_tetap').value) || 0;
            const profesional = parseInt(document.getElementById('edit_profesional').value) || 0;
            const perbantuan = parseInt(document.getElementById('edit_perbantuan').value) || 0;

            const totalDosen = tetap + calonTetap + profesional + perbantuan;

            // Calculate percentages with max 100%
            let persenS3 = totalDosen > 0 ? (s3 / totalDosen * 100) : 0;
            persenS3 = Math.min(persenS3, 100); // Cap at 100%

            let llkgb = totalDosen > 0 ? ((l + lk + gb) / totalDosen * 100) : 0;
            llkgb = Math.min(llkgb, 100); // Cap at 100%

            let jfa = totalDosen > 0 ? ((aa + l + lk + gb) / totalDosen * 100) : 0;
            jfa = Math.min(jfa, 100); // Cap at 100%

            // Update display
            document.getElementById('edit_total_dosen').textContent = totalDosen;
            document.getElementById('edit_persen_s3').value = persenS3.toFixed(2) + '%';
            document.getElementById('edit_llkgb').value = llkgb.toFixed(2) + '%';
            document.getElementById('edit_jfa').value = jfa.toFixed(2) + '%';
        }

        // Save statistics
        function saveStats(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            const prodiId = document.getElementById('editProdiId').value;

            // Show loading
            const submitBtn = event.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Menyimpan...';
            submitBtn.disabled = true;

            // Send AJAX request
            fetch(`/manage/prodi/${prodiId}/update-stats`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('✅ Data berhasil disimpan!');
                        closeEditModal();
                        location.reload(); // Reload page to show updated data
                    } else {
                        alert('❌ Gagal menyimpan data: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('❌ Terjadi kesalahan saat menyimpan data');
                })
                .finally(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
        }

        // Add event listeners for auto-calculation
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));

            // Add change listeners to all input fields
            const calcFields = [
                'edit_s2', 'edit_s3', 'edit_njad', 'edit_aa', 'edit_l', 'edit_lk', 'edit_gb',
                'edit_tetap', 'edit_calon_tetap', 'edit_profesional', 'edit_perbantuan'
            ];

            calcFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('input', calculateStats);
                }
            });
        });

        function printTable() {
            // Collapse all details before printing
            const allDetails = document.querySelectorAll('.expand-row');
            allDetails.forEach(detail => detail.classList.remove('show'));

            var printContents = document.getElementById('rekapTable').outerHTML;
            var originalContents = document.body.innerHTML;

            var printWindow = document.body.innerHTML = `
                <html>
                <head>
                    <title>Rekapitulasi Dosen per Program Studi</title>
                    <style>
                        table { border-collapse: collapse; width: 100%; font-size: 11px; }
                        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
                        th { background-color: #f0f0f0; font-weight: bold; }
                        .bg-gradient-to-r { background: #f5f5f5 !important; }
                        .expand-row { display: none !important; }
                        @media print {
                            body { margin: 0; }
                            table { page-break-inside: auto; }
                            tr { page-break-inside: avoid; page-break-after: auto; }
                            .btn-expand, .btn-edit { display: none; }
                            .expand-row { display: none !important; }
                        }
                    </style>
                </head>
                <body>
                    <h2 style="text-align: center;">Rekapitulasi Dosen per Program Studi</h2>
                    <h3 style="text-align: center;">Telkom University Surabaya</h3>
                    ${printContents}
                </body>
                </html>
            `;

            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

        function exportToCSV() {
            const prodiStats = @json($prodiStats);
            let csv = [];

            // Header
            csv.push(['No', 'Prodi', 'Fakultas', 'Total Dosen', 'S2', 'S3', '%S3', 'NJAD', 'AA', 'L', 'LK', 'GB',
                'LLKGB', 'JFA', 'Tetap', 'Calon Tetap', 'Profesional', 'Perbantuan'
            ].join(','));

            // Data
            prodiStats.forEach((stat, index) => {
                csv.push([
                    index + 1,
                    `"${stat.nama_prodi}"`,
                    `"${stat.fakultas}"`,
                    stat.total_dosen,
                    stat.s2,
                    stat.s3,
                    (stat.persen_s3 * 100).toFixed(2) + '%',
                    stat.njad,
                    stat.aa,
                    stat.l,
                    stat.lk,
                    stat.gb,
                    (stat.llkgb * 100).toFixed(2) + '%',
                    (stat.jfa * 100).toFixed(2) + '%',
                    stat.tetap,
                    stat.calon_tetap,
                    stat.profesional,
                    stat.perbantuan
                ].join(','));
            });

            // Total row
            const totals = @json($totals);
            csv.push([
                'TOTAL',
                '',
                '',
                totals.total_dosen,
                totals.s2,
                totals.s3,
                (totals.persen_s3 * 100).toFixed(2) + '%',
                totals.njad,
                totals.aa,
                totals.l,
                totals.lk,
                totals.gb,
                (totals.llkgb * 100).toFixed(2) + '%',
                (totals.jfa * 100).toFixed(2) + '%',
                totals.tetap,
                totals.calon_tetap,
                totals.profesional,
                totals.perbantuan
            ].join(','));

            // Download
            var csvFile = new Blob([csv.join('\n')], {
                type: 'text/csv;charset=utf-8;'
            });
            var downloadLink = document.createElement('a');
            downloadLink.download = 'rekap_dosen_prodi_' + new Date().toISOString().slice(0, 10) + '.csv';
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));

            // Add change listeners to all input fields
            const calcFields = [
                'edit_s2', 'edit_s3', 'edit_njad', 'edit_aa', 'edit_l', 'edit_lk', 'edit_gb',
                'edit_tetap', 'edit_calon_tetap', 'edit_profesional', 'edit_perbantuan'
            ];

            calcFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('input', calculateStats);
                }
            });
        });
    </script>

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

                <!-- Summary -->
                <div class="p-4 bg-gray-100 rounded-lg border border-gray-300 mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-gray-700">
                            <i class="bi bi-people-fill"></i> Total Dosen (Auto):
                        </span>
                        <span id="edit_total_dosen" class="text-lg font-bold text-gray-700">0</span>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t">
                    <button type="button" onclick="closeEditModal()"
                        class="px-5 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition font-medium">
                        <i class="bi bi-x-circle"></i> Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium">
                        <i class="bi bi-save"></i> Simpan
                    </button>
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

    <!-- Include Create Modal -->
    @include('kelola_data.prodi.create')

    <!-- Include Detail Modal -->
    @include('kelola_data.prodi.show')

    <!-- Include Delete Modal -->
    @include('kelola_data.prodi.delete')
@endsection
