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
            <div class="flex items-center gap-[5.874740123748779px] self-stretch"><span
                    class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Daftar
                    Akun</span></div><span
                class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">Anda dapat
                melihat semua akun yang terdaftar di sistem disini</span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <button class="flex">
                <div class="flex rounded-[5.874740123748779px]">
                    <div
                        class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px]">
                        <i class="bi bi-filter text-sm"></i>
                        <span
                            class="font-medium text-[10.280795097351074px] leading-[14.686850547790527px] text-[#344054]">Filters</span>
                    </div>
                </div>
            </button>
            <button class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border-[0.7343425154685974px] border-solid border-[#d0d5dd]">
                    <i class="bi bi-cloud-download text-sm "></i>
                    <span
                        class="font-medium text-[10.280795097351074px] leading-[14.686850547790527px] text-[#344054]">Import</span>
                </div>
            </button>
            <button class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border-[0.7343425154685974px] border-solid border-[#d0d5dd]">
                    <i class="bi bi-cloud-upload text-sm"></i>
                    <span
                        class="font-medium text-[10.280795097351074px] leading-[14.686850547790527px] text-[#344054]">Export</span>
                </div>
                </dibuttonv>
                <button class="flex rounded-[5.874740123748779px]">
                    <div
                        class="flex justify-center items-center gap-[5.874740123748779px] bg-[#0070ff] px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border-[0.7343425154685974px] border-solid border-[#0070ff]">
                        <i class="bi bi-plus text-sm text-white"></i>
                        <span
                            class="font-medium text-[10.280795097351074px] leading-[14.686850547790527px] text-white">Tambah</span>
                    </div>
                </button>
        </div>
    </div>
@endsection
@section('content-base')
    <div class="flex flex-grow-0 flex-col gap-2 max-w-100">
        <div class="flex items-center gap-[3.7518811225891113px]">
            <div
                class="h-[17.508777618408203px] flex justify-center items-center gap-[6.253134727478027px] bg-[#0070ff] p-[6.253134727478027px] rounded-tl-[1.8759405612945557px] rounded-tr-[1.8759405612945557px]">
                <span class="font-semibold text-[8.129075050354004px] text-center text-white">Semua</span>
            </div>
            <div
                class="h-[17.508777618408203px] flex justify-center items-center gap-[6.253134727478027px] p-[6.253134727478027px]">
                <span class="font-semibold text-[8.129075050354004px] text-center text-[#1c2762]">TPA</span>
            </div>
            <div
                class="h-[17.508777618408203px] flex justify-center items-center gap-[6.253134727478027px] p-[6.253134727478027px]">
                <span class="font-semibold text-[8.129075050354004px] text-center text-[#1c2762]">Dosen</span>
            </div>
        </div>
        <div class="h-auto w-full flex flex-col justify-end items-end gap-2.5 rounded-[5.874740123748779px]">
            <div
                class="flex items-center gap-[5.874740123748779px] self-stretch bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-lg border-[0.7343425154685974px] border-solid border-[#d0d5dd]">
                <i class="fa-solid fa-magnifying-glass text-sm"></i>
                <input type="text" placeholder="Search"
                    class="font-medium border-none outline-none p-1 focus:ring-0 w-full text-sm leading-[14.686850547790527px] text-[#344054]">
            </div>
        </div>

        <div class="overflow-hidden py-2 w-full">
            <div class="overflow-x-auto">
                <div class="inline-block align-middle">
                    <div class="overflow-x-scroll border border-gray-200 rounded-lg shadow-sm">
                        <table class="divide-y divide-gray-200">
                            <thead class="bg-blue-50 max-w-screen">
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Fullname</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Email</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Phone</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-semibold text-blue-600 uppercase tracking-wider">
                                        Created At</th>
                                    <th
                                        class="px-4 py-3 text-xs font-semibold text-blue-600 uppercase tracking-wider text-right">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm text-blue-900">
                                @for ($i = 0; $i < 20; $i++)
                                    <tr>
                                        <td class="px-4 py-3 whitespace-nowrap">#1</td>
                                        <td class="px-4 py-3 whitespace-nowrap">Damilare Anjorin</td>
                                        <td class="px-4 py-3 whitespace-nowrap">damilareanjorin1@gmail.com</td>
                                        <td class="px-4 py-3 whitespace-nowrap">+2348106420637</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <span
                                                class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                active
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">September 12</td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right">
                                            <button
                                                class="px-4 py-1 border border-blue-500 text-blue-500 rounded-md text-sm font-medium hover:bg-blue-600 hover:text-white transition duration-200">
                                                View Details
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div
                            class="flex flex-col mx-2 sm:flex-row sm:items-center sm:justify-between mt-4 text-sm text-blue-700">
                            <p>
                                Showing <span class="font-semibold">1</span> to <span class="font-semibold">200</span> of
                                <span class="font-semibold">2000</span> results
                            </p>
                            <nav class="my-2  sm:mt-0 flex space-x-1">
                                <a href="#"
                                    class="px-3 py-1 border border-gray-300 rounded-md text-gray-500 hover:bg-blue-50">&lt;</a>
                                <a href="#"
                                    class="px-3 py-1 border border-blue-500 bg-blue-500 text-white rounded-md">1</a>
                                <a href="#"
                                    class="px-3 py-1 border border-gray-300 rounded-md hover:bg-blue-50">2</a>
                                <a href="#"
                                    class="px-3 py-1 border border-gray-300 rounded-md hover:bg-blue-50">3</a>
                                <a href="#"
                                    class="px-3 py-1 border border-gray-300 rounded-md text-gray-500 hover:bg-blue-50">&gt;</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>
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
