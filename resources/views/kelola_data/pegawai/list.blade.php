@extends('kelola_data.base')
@section('header-base')
    <style>
        .max-w-100 {
            max-width: 100% !important;
        }

        .search-input {
            border: rgba(0, 0, 0, 0.097) 0.5px solid !important;
            border-radius: 4px !important;
            font-size: 10px !important;
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
                    Pegawai</span></div><span
                class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda dapat
                melihat semua pegawai yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">

            <!-- Import -->
            {{-- <button class="flex">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#d0d5dd] hover:bg-gray-50 transition">
                    <i class="bi bi-cloud-download text-sm text-[#344054]"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-[#344054]">Import</span>
                </div>
            </button> --}}

            <!-- Print Table -->
            <button id="printTableBtn" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#d0d5dd] hover:bg-gray-50 transition">
                    <i class="bi bi-printer text-sm text-[#344054]"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-[#344054]">Print Table</span>
                </div>
            </button>

            <!-- Export CSV -->
            <button id="exportCsvBtn" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#d0d5dd] hover:bg-gray-50 transition">
                    <i class="bi bi-filetype-csv text-sm text-[#344054]"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-[#344054]">Export CSV</span>
                </div>
            </button>

            <!-- Tambah -->
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
        <!-- Search Bar -->
        <div class="h-auto w-full flex flex-col justify-end items-end gap-2.5 rounded-[5.874740123748779px] mb-1">
            <div
                class="flex items-center gap-[5.874740123748779px] self-stretch bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-lg border-[0.7343425154685974px] border-solid border-[#d0d5dd] min-w-full sm:w-1/3">
                <i class="fa-solid fa-magnifying-glass text-sm text-gray-500"></i>
                <input id="customSearchInput" type="text" placeholder="Search"
                    class="font-medium border-none outline-none p-1 focus:ring-0 w-full text-sm leading-[14.6px] text-[#344054]">
            </div>
        </div>

        <div class="overflow-hidden pb-2 pt-0 w-full">
            <div class="overflow-x-auto">
                <div class="inline-block align-middle">


                    <div class="border border-gray-200 rounded-lg shadow-sm">
                        <table id="pegawaiTable" data-toggle="table" data-filter-control="true" data-show-loading="false"
                            class="min-w-full table-auto text-sm rounded-lg text-blue-900 border-collapse">

                            <thead class="bg-blue-50 rounded-lg text-center align-middle">
                                <tr class="rounded-lg">
                                    <th data-field="nama" data-filter-control="input"
                                        class="px-4 py-3 rounded-lg text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Nama Lengkap
                                    </th>
                                    <th data-field="gender" data-filter-control="select"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Gender
                                    </th>
                                    <th data-field="hp" data-filter-control="input"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        No. HP
                                    </th>
                                    <th data-field="tipe" data-filter-control="select"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Tipe Pegawai
                                    </th>
                                    <th data-field="status" data-filter-control="select"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th data-field="aktif" data-filter-control="select"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Is Active
                                    </th>
                                    <th data-field="email_pribadi" data-filter-control="input"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Email Pribadi
                                    </th>
                                    <th data-field="email_institusi" data-filter-control="input"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Email Institusi
                                    </th>
                                    <th data-field="action"
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 text-center align-middle">
                                @for ($i = 0; $i < 20; $i++)
                                    <tr class="">
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">Alianda {{ $i }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">Male</td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">085623144152</td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">
                                            {{ $i % 2 == 0 ? 'TPA' : 'Dosen' }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">Pegawai Tetap</td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">
                                            <span
                                                class="inline-flex items-center justify-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Active
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">
                                            astigful{{ $i }}@gmail.com</td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">
                                            astigful{{ $i }}@telkomuniversity.ac.id</td>
                                        <td class="px-4 py-3 whitespace-nowrap align-middle">
                                            <div class="flex items-center justify-center gap-3">
                                                <!-- WhatsApp Button -->
                                                <!-- WhatsApp Button dengan Popover -->
                                                <a href="https://wa.me/628972529100" target="_blank"
                                                    data-bs-container="body" data-bs-toggle="popover"
                                                    data-bs-placement="top" data-bs-trigger="hover"
                                                    data-bs-content="Hubungi lewat WhatsApp 📱"
                                                    class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] bg-white hover:bg-[#f9fafb] transition duration-150 ease-in-out">
                                                    <i class="bi bi-whatsapp text-[#25D366] text-[16px]"></i>
                                                </a>


                                                <!-- Power Button -->
                                                <button
                                                    class="flex items-center justify-center w-7 h-7 rounded-md border border-[#d0d5dd] bg-white hover:bg-[#f9fafb] transition">
                                                    <i class="fa-solid fa-power-off text-[#10B981] text-[14px]"></i>
                                                </button>

                                                <!-- View Details Button -->
                                                <button
                                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                                    View Details
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>


                    <!-- Script -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
                    <script
                        src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/filter-control/bootstrap-table-filter-control.min.js">
                    </script>

                    <script>
                        $(function() {
                            // Inisialisasi tabel
                            $('#pegawaiTable').bootstrapTable();

                            // Hilangkan pesan "Loading, please wait" kalau ada
                            $('.fixed-table-loading').hide();

                            // Fungsi search eksternal
                            $('#customSearchInput').on('keyup', function() {
                                const value = $(this).val().toLowerCase();
                                $('#pegawaiTable tbody tr').filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                                });
                            });
                        });
                    </script>


                </div>
            </div>

        </div>
    </div>

    <script>
        document.getElementById("printTableBtn").addEventListener("click", function() {
            // Clone tabel agar tidak mengubah aslinya
            const table = document.getElementById("pegawaiTable").cloneNode(true);

            // Hapus kolom terakhir (Action) di setiap baris <thead> dan <tbody>
            table.querySelectorAll("tr").forEach(tr => {
                const lastCell = tr.lastElementChild;
                if (lastCell) lastCell.remove();
            });

            // Hapus elemen filter (input/select di header)
            table.querySelectorAll('thead input, thead select').forEach(el => el.remove());

            // Ambil tanggal & waktu saat ini
            const now = new Date();
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                timeZone: 'Asia/Jakarta'
            };
            const formattedDate = now.toLocaleString('id-ID', options) + " WIB";

            // Nama halaman
            const pageTitle = "Daftar Pegawai";

            // Buat jendela print baru
            const newWin = window.open("");
            newWin.document.write(`
            <html>
                <head>
                    <title>${pageTitle}</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            padding: 20px;
                            color: #000;
                        }
                        h1 {
                            text-align: center;
                            font-size: 18px;
                            margin-bottom: 5px;
                            color: #1c2762;
                        }
                        p.print-date {
                            text-align: center;
                            font-size: 12px;
                            margin-bottom: 20px;
                            color: #555;
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 10px;
                        }
                        th, td {
                            border: 1px solid #ccc;
                            padding: 8px;
                            text-align: center;
                            font-size: 12px;
                        }
                        th {
                            background-color: #f0f4ff;
                            color: #1c2762;
                        }
                        @media print {
                            body { -webkit-print-color-adjust: exact; }
                        }
                    </style>
                </head>
                <body>
                    <h1>${pageTitle}</h1>
                    <p class="print-date">Dicetak pada: ${formattedDate}</p>
                    ${table.outerHTML}
                </body>
            </html>
        `);
            newWin.document.close();
            newWin.focus();
            newWin.print();
        });
    </script>

    <script>
        document.getElementById("exportCsvBtn").addEventListener("click", function() {
            const table = document.getElementById("pegawaiTable");
            let csvContent = "";

            // Ambil semua baris
            const rows = table.querySelectorAll("tr");

            rows.forEach((row, index) => {
                const cols = row.querySelectorAll("th, td");
                const rowData = [];

                // Loop kolom tapi jangan ambil kolom terakhir (Action)
                cols.forEach((col, colIndex) => {
                    if (colIndex !== cols.length - 1) {
                        // Escape koma dan tanda kutip
                        const text = col.innerText.replace(/"/g, '""');
                        rowData.push(`"${text}"`);
                    }
                });

                csvContent += rowData.join(",") + "\n";
            });

            // Buat blob CSV dan trigger download
            const blob = new Blob([csvContent], {
                type: "text/csv;charset=utf-8;"
            });
            const url = URL.createObjectURL(blob);
            const link = document.createElement("a");
            link.href = url;

            // Tambahkan nama file dengan tanggal
            const now = new Date();
            const formattedDate = now.toLocaleDateString("id-ID").replace(/\//g, "-");
            link.download = `Daftar_Pegawai_${formattedDate}.csv`;

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));
        });
    </script>


    <script>
        function updateWrapperWidth() {
            const sidebar = document.getElementById("sidebar");
            const wrapper = document.getElementById("wrapper-table");

            if (sidebar && wrapper) {
                const sidebarWidth = sidebar.offsetWidth;
                wrapper.style.width = `calc(100% - ${sidebarWidth}px)`;
            }
        }

        // Hitung ulang saat scroll, resize, atau perubahan DOM
        window.addEventListener("scroll", updateWrapperWidth);
        window.addEventListener("resize", updateWrapperWidth);

        // Jika wrapper sendiri bisa di-scroll horizontal
        document.getElementById("wrapper-table").addEventListener("scroll", updateWrapperWidth);

        // Jalankan pertama kali
        updateWrapperWidth();
    </script>
@endsection
