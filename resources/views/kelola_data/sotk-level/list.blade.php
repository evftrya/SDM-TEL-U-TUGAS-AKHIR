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
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar Level</span>
            </div><span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda
                dapat melihat semua level yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">


            <x-print-tb target_id="LevelTable"></x-print-tb>
            <x-export-csv-tb target_id="LevelTable"></x-export-csv-tb>

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
    <div class="flex flex-col md:flex-row gap-2">
        <div class="">
            <x-tb id="LevelTable">
                <x-slot:table_header>
                    <x-tb-td nama="hp">Nama Level</x-tb-td>
                    <x-tb-td nama="tipe">Singkatan</x-tb-td>
                    <x-tb-td nama="status">Atasan</x-tb-td>
                    <x-tb-td nama="action">Action</x-tb-td>
                </x-slot:table_header>
                <x-slot:table_column>
                    {{-- @for ($i = 0; $i < 30; $i++) --}}
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Directur</x-tb-cl-fill>
                        <x-tb-cl-fill>DIR</x-tb-cl-fill>
                        <x-tb-cl-fill>0</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Wakil Directur</x-tb-cl-fill>
                        <x-tb-cl-fill>WADIR</x-tb-cl-fill>
                        <x-tb-cl-fill>1</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Kepala Bagian</x-tb-cl-fill>
                        <x-tb-cl-fill>Kabag</x-tb-cl-fill>
                        <x-tb-cl-fill>2</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Dekan</x-tb-cl-fill>
                        <x-tb-cl-fill>DEKAN</x-tb-cl-fill>
                        <x-tb-cl-fill>2</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Kepala Urusan</x-tb-cl-fill>
                        <x-tb-cl-fill>KAUR</x-tb-cl-fill>
                        <x-tb-cl-fill>3</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Kepala Program Studi</x-tb-cl-fill>
                        <x-tb-cl-fill>KAPRODI</x-tb-cl-fill>
                        <x-tb-cl-fill>4</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Anggota Bagian</x-tb-cl-fill>
                        <x-tb-cl-fill>Anggota</x-tb-cl-fill>
                        <x-tb-cl-fill>5</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    <x-tb-cl id="">
                        <x-tb-cl-fill>Anggota Program Studi</x-tb-cl-fill>
                        <x-tb-cl-fill>Anggota</x-tb-cl-fill>
                        <x-tb-cl-fill>6</x-tb-cl-fill>
                        <x-tb-cl-fill>
                            <div class="flex items-center justify-center gap-3">
                                <!-- View Details Button -->
                                <button
                                    class="px-3 py-1.5 border border-[#0070ff] text-[#0070ff] rounded-md text-xs font-medium hover:bg-[#0070ff] hover:text-white transition duration-200">
                                    View Details
                                </button>
                            </div>
                        </x-tb-cl-fill>
                    </x-tb-cl>
                    {{-- @endfor --}}
                </x-slot:table_column>
            </x-tb>
        </div>
        {{-- <div class="self-stretch flex border-l-2 border-gray-500 mx-6" style="border: 0.3px solid !immportant;"></div> --}}

        <div id="chart-container" class="flex-grow flex flex-col justify-center items-center">
            <div class="w-full flex md:hidden mt-3 mb-2">
                <h1 class="text-2xl text-start font-medium">Preview Struktur</h1>
            </div>
            <div id="tree" class="h-fit sm:h-3/4"></div>
            <span class="text-sm text-center font-normal">Klik icon di kanan bawah untuk mengembalikan ke semula</span>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            [...popoverTriggerList].map(el => new bootstrap.Popover(el));
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // 🔹 Ambil data dari tabel
            const rows = document.querySelectorAll("#LevelTable .x-tb-cl");
            const nodes = [];

            rows.forEach((row, index) => {
                const cols = row.querySelectorAll(".fill-table-row");
                // console.log('cols[0] :>> ', index);
                const id = (index+1); // No → id
                const division = cols[1]?.textContent.trim() || ""; // Nama Level → division
                const singkatan = cols[2]?.textContent.trim() ||
                    ""; // Singkatan → tambahan di sebelah division
                const pid = cols[3]?.textContent.trim() || "0"; // Atasan → pid

                nodes.push({
                    id: parseInt(id),
                    pid: pid !== "0" ? parseInt(pid) : null,
                    division: `${division} (${singkatan})`, // tampilkan gabungan division + singkatan
                    photo: `https://randomuser.me/api/portraits/${id % 2 === 0 ? "men" : "women"}/${20 + parseInt(id)}.jpg`
                });
            });

            console.log("Nodes dari tabel:", nodes);

            // 🔹 Inisialisasi OrgChart
            const chart = new OrgChart(document.getElementById("tree"), {
                template: "olivia",
                // Hilangkan search
                enableSearch: false, // pastikan ini eksplisit

                menu: {
                    pdf: {
                        text: "Export PDF",
                        filename: "struktur-organisasi",
                    },
                    png: {
                        text: "Export PNG",
                        filename: "struktur-organisasi",
                    },
                },
                toolbar: {
                    // zoom: true,
                    fit: true
                },
                // mouseScrool: OrgChart.action.move,
                mouseScrool: OrgChart.action.none,
                // showXScroll: OrgChart.scroll.visible,
                // showYScroll: OrgChart.scroll.visible,
                scaleInitial: 0.3,
                scaleMin: 0.3,
                scaleMax: 6,
                pan: true,
                collapse: {
                    level: 7
                },
                nodeBinding: {
                    field_0: "division",
                    img_0: "photo",
                },
                nodes: nodes,
            });


            // 🌈 Template kustom
            OrgChart.templates.olivia.size = [270, 100];
            OrgChart.templates.olivia.node =
                '<rect x="0" y="0" width="270" height="100" rx="18" ry="18" fill="#1C2762" stroke="#1C2762" stroke-width="1.5"></rect>';
            OrgChart.templates.olivia.img_0 =
                '<defs>' +
                '<radialGradient id="photoRing_{randId}" cx="50%" cy="50%" r="50%">' +
                '<stop offset="60%" stop-color="#0070FF"/>' +
                '<stop offset="100%" stop-color="#1C2762"/>' +
                '</radialGradient>' +
                '</defs>' +
                '<circle cx="45" cy="50" r="28" fill="url(#photoRing_{randId})"></circle>' +
                '<clipPath id="cp_{randId}">' +
                '<circle cx="45" cy="50" r="24"></circle>' +
                '</clipPath>' +
                '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#cp_{randId})" xlink:href="{val}" x="21" y="26" width="48" height="48"></image>';
            OrgChart.templates.olivia.field_0 =
                '<text style="font-size:14px;font-weight:700;" fill="#FFFFFF" x="85" y="56">{val}</text>';

            chart.fit();
        });
    </script>
@endsection
