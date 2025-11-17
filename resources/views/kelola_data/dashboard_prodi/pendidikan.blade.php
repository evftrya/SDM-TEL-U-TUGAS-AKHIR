@extends('kelola_data.base')

@section('header-base')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* No custom styles needed - using existing design system */
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Dashboard Pendidikan
                    Prodi</span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Statistik jenjang pendidikan dosen per program studi (S2 dan S3)
            </span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <button onclick="printTable()" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-gray-600 px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-gray-600 hover:bg-gray-700 transition">
                    <i class="bi bi-printer text-sm text-white"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-white">Print</span>
                </div>
            </button>
            <button onclick="exportToCSV()" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-green-600 px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-green-600 hover:bg-green-700 transition">
                    <i class="bi bi-file-earmark-excel text-sm text-white"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-white">Export CSV</span>
                </div>
            </button>
        </div>
    </div>
@endsection

@section('content-base')
    {{-- Chart & Summary Combined --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-5 border border-gray-200">
            <h4 class="text-md font-semibold text-gray-800 mb-4">Distribusi Pendidikan Dosen</h4>
            <div class="flex justify-center">
                <canvas id="pendidikanChart" style="max-height: 280px;"></canvas>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow p-5 border border-gray-200">
            <h4 class="text-md font-semibold text-gray-800 mb-4">Statistik Pendidikan</h4>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded border border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-pink-100 rounded-lg">
                            <i class="bi bi-book text-xl text-pink-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">S2 (Magister)</p>
                            <p class="text-sm font-medium text-gray-700">{{ $totals['s2'] }} dosen</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-900">
                            {{ $totals['total_dosen'] > 0 ? number_format(($totals['s2'] / $totals['total_dosen']) * 100, 1) : 0 }}%
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded border border-gray-200">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <i class="bi bi-book-fill text-xl text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">S3 (Doktor)</p>
                            <p class="text-sm font-medium text-gray-700">{{ $totals['s3'] }} dosen</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-gray-900">{{ number_format($totals['persen_s3'] * 100, 1) }}%
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg border border-blue-200 mt-4">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-600 rounded-lg">
                            <i class="bi bi-people-fill text-xl text-white"></i>
                        </div>
                        <span class="text-sm font-semibold text-blue-900">Total Dosen</span>
                    </div>
                    <span class="text-3xl font-bold text-blue-900">{{ $totals['total_dosen'] }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Data Table --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Rekapitulasi Pendidikan Dosen per Program Studi</h3>
        </div>

        <table id="pendidikanTable" class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-3 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border">No.
                    </th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border">Prodi
                    </th>
                    <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">
                        Total Dosen</th>
                    <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">S2
                    </th>
                    <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">S3
                    </th>
                    <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">% S3
                    </th>
                    <th class="px-3 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider border">Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($prodiStats as $index => $stat)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 py-3 text-center border">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-left border">
                            <div class="font-medium text-gray-900">{{ $stat['nama_prodi'] }}</div>
                            <div class="text-xs text-gray-500">{{ $stat['fakultas'] }}</div>
                        </td>
                        <td class="px-3 py-3 text-center border font-semibold">{{ $stat['total_dosen'] }}</td>
                        <td class="px-3 py-3 text-center border">
                            <span class="px-2 py-1 bg-pink-100 text-pink-800 rounded">{{ $stat['s2'] }}</span>
                        </td>
                        <td class="px-3 py-3 text-center border">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded">{{ $stat['s3'] }}</span>
                        </td>
                        <td class="px-3 py-3 text-center border">
                            <span
                                class="font-semibold text-gray-700">{{ number_format($stat['persen_s3'] * 100, 2) }}%</span>
                        </td>
                        <td class="px-3 py-3 text-center border">
                            @if ($stat['total_dosen'] == 0 || ($stat['s2'] == 0 && $stat['s3'] == 0))
                                <button
                                    onclick="openEditModal('{{ $stat['id'] }}', '{{ $stat['nama_prodi'] }}', {{ $stat['s2'] }}, {{ $stat['s3'] }}, {{ $stat['total_dosen'] }})"
                                    class="px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                            @else
                                <span class="text-xs text-gray-400 italic">Auto</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                            Belum ada data program studi
                        </td>
                    </tr>
                @endforelse

                @if ($prodiStats->count() > 0)
                    <tr class="bg-gray-100 font-bold border-t-2 border-gray-300">
                        <td colspan="2" class="px-4 py-3 text-center border">TOTAL</td>
                        <td class="px-3 py-3 text-center border">{{ $totals['total_dosen'] }}</td>
                        <td class="px-3 py-3 text-center border">{{ $totals['s2'] }}</td>
                        <td class="px-3 py-3 text-center border">{{ $totals['s3'] }}</td>
                        <td class="px-3 py-3 text-center border">{{ number_format($totals['persen_s3'] * 100, 2) }}%</td>
                        <td class="px-3 py-3 text-center border">-</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- Keterangan --}}
    <div class="mt-4 p-4 bg-white rounded-lg shadow-sm border border-gray-200">
        <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
            <i class="bi bi-info-circle-fill text-blue-600"></i>
            Keterangan
        </h4>
        <div class="text-xs text-gray-700 space-y-2">
            <div class="bg-gray-50 p-2 rounded border border-gray-200">
                <strong>S2:</strong> Dosen dengan jenjang pendidikan Magister
            </div>
            <div class="bg-gray-50 p-2 rounded border border-gray-200">
                <strong>S3:</strong> Dosen dengan jenjang pendidikan Doktor
            </div>
            <div class="bg-gray-50 p-2 rounded border border-gray-200">
                <strong>% S3:</strong> Persentase dosen berpendidikan S3 = (S3 ÷ Total Dosen) × 100%
            </div>
        </div>
    </div>

    {{-- Modal Edit Data --}}
    <div id="editModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div id="editModalBackdrop" class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-4 overflow-hidden z-10">
            <!-- Header -->
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-xl font-semibold text-white">Edit Data Pendidikan</h2>
                <p id="modalProdiName" class="text-sm text-blue-100 mt-1"></p>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-4">
                <form id="editForm">
                    <input type="hidden" id="prodiId">

                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-3 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="bi bi-exclamation-triangle-fill text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-yellow-700">
                                    Data ini akan menimpa perhitungan otomatis. Isi dengan data yang akurat.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="editS2" class="block text-sm font-medium text-gray-700 mb-1">
                                Jumlah S2 <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="editS2" min="0" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>
                        <div>
                            <label for="editS3" class="block text-sm font-medium text-gray-700 mb-1">
                                Jumlah S3 <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="editS3" min="0" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-600 focus:border-blue-600">
                        </div>
                    </div>

                    <div class="mt-4 p-3 bg-gray-50 rounded border border-gray-200">
                        <div class="text-xs text-gray-600">
                            <strong>Total Dosen saat ini:</strong> <span id="currentTotal" class="font-semibold"></span>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            Pastikan S2 + S3 tidak melebihi total dosen
                        </div>
                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" onclick="closeEditModal()"
                            class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Initialize Pie Chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('pendidikanChart').getContext('2d');
            const totals = @json($totals);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['S2 (Magister)', 'S3 (Doktor)'],
                    datasets: [{
                        data: [totals.s2, totals.s3],
                        backgroundColor: [
                            'rgb(219, 39, 119)', // pink-600
                            'rgb(37, 99, 235)' // blue-600
                        ],
                        borderColor: [
                            'rgb(255, 255, 255)',
                            'rgb(255, 255, 255)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 15,
                                font: {
                                    size: 12
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed + ' dosen';
                                    const percentage = totals.total_dosen > 0 ?
                                        ((context.parsed / totals.total_dosen) * 100).toFixed(2) :
                                        0;
                                    label += ' (' + percentage + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        });

        function printTable() {
            var printContents = document.getElementById('pendidikanTable').outerHTML;
            var printWindow = window.open('', '', 'height=600,width=800');

            printWindow.document.write('<html><head><title>Dashboard Pendidikan Prodi</title>');
            printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; font-size: 11px; }');
            printWindow.document.write('th, td { border: 1px solid #000; padding: 6px; text-align: center; }');
            printWindow.document.write('th { background-color: #f0f0f0; font-weight: bold; }</style></head><body>');
            printWindow.document.write('<h2 style="text-align: center;">Dashboard Pendidikan Dosen per Program Studi</h2>');
            printWindow.document.write('<h3 style="text-align: center;">Telkom University Surabaya</h3>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');

            printWindow.document.close();
            printWindow.print();
        }

        function exportToCSV() {
            const prodiStats = @json($prodiStats);
            let csv = [];

            csv.push(['No', 'Prodi', 'Fakultas', 'Total Dosen', 'S2', 'S3', '%S3'].join(','));

            prodiStats.forEach((stat, index) => {
                csv.push([
                    index + 1,
                    `"${stat.nama_prodi}"`,
                    `"${stat.fakultas}"`,
                    stat.total_dosen,
                    stat.s2,
                    stat.s3,
                    (stat.persen_s3 * 100).toFixed(2) + '%'
                ].join(','));
            });

            const totals = @json($totals);
            csv.push([
                'TOTAL', '', '',
                totals.total_dosen,
                totals.s2,
                totals.s3,
                (totals.persen_s3 * 100).toFixed(2) + '%'
            ].join(','));

            var csvFile = new Blob([csv.join('\n')], {
                type: 'text/csv;charset=utf-8;'
            });
            var downloadLink = document.createElement('a');
            downloadLink.download = 'dashboard_pendidikan_' + new Date().toISOString().slice(0, 10) + '.csv';
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display = 'none';
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        }

        // Modal functions
        function openEditModal(prodiId, prodiName, s2, s3, totalDosen) {
            document.getElementById('prodiId').value = prodiId;
            document.getElementById('modalProdiName').textContent = prodiName;
            document.getElementById('editS2').value = s2;
            document.getElementById('editS3').value = s3;
            document.getElementById('currentTotal').textContent = totalDosen + ' dosen';

            document.getElementById('editModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Form submit handler
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const prodiId = document.getElementById('prodiId').value;
            const s2 = parseInt(document.getElementById('editS2').value);
            const s3 = parseInt(document.getElementById('editS3').value);

            // Fetch existing cache data first, then update
            fetch(`/manage/prodi/${prodiId}/get-cached-stats`)
                .then(response => response.json())
                .then(cachedData => {
                    const data = {
                        s2: s2,
                        s3: s3,
                        njad: cachedData.njad || 0,
                        aa: cachedData.aa || 0,
                        l: cachedData.l || 0,
                        lk: cachedData.lk || 0,
                        gb: cachedData.gb || 0,
                        tetap: cachedData.tetap || 0,
                        calon_tetap: cachedData.calon_tetap || 0,
                        profesional: cachedData.profesional || 0,
                        perbantuan: cachedData.perbantuan || 0
                    };

                    // Send AJAX request to update
                    return fetch(`/manage/prodi/${prodiId}/update-stats`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data)
                    });
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data berhasil diperbarui');
                        closeEditModal();
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan data');
                });
        });

        // Close modal on backdrop click
        document.getElementById('editModalBackdrop')?.addEventListener('click', closeEditModal);

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
            }
        });
    </script>
@endsection
