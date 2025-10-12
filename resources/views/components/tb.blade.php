@props(['id' => null, 'cls' => null])
@aware(['table_header', 'table_column','put_something'])
<style>
    .search-input {
        border: rgba(0, 0, 0, 0.097) 0.5px solid !important;
        border-radius: 4px !important;
        font-size: 10px !important;
    }
</style>

<div class="h-auto max-h-fit w-full flex flex-row justify-center items-center gap-2.5 rounded-[5.874740123748779px] mb-1">
    <div
        class="flex items-center gap-[5.874740123748779px] self-stretch bg-white px-[11.749480247497559px] py-[7.343425273895264px] rounded-lg border-[0.7343425154685974px] border-solid border-[#d0d5dd] flex-grow sm:w-1/3">
        <i class="fa-solid fa-magnifying-glass text-sm text-gray-500"></i>
        <input id="customSearchInput" type="text" placeholder="Search"
            class="font-medium border-none outline-none p-1 focus:ring-0 w-full text-sm leading-[14.6px] text-[#344054]">
    </div>
    {{$put_something}}
</div>

<div class="overflow-hidden pb-2 pt-0 w-full">
    <div class="overflow-x-auto">
        <div class="inline-block w-full align-middle">
            <div class="border border-gray-200 rounded-lg">
                <table id="{{ $id }}" data-toggle="table" data-filter-control="true" data-show-loading="false"
                    class="min-w-full table-auto text-sm rounded-lg text-blue-900 border-collapse {{ $cls }}">

                    <thead class="bg-blue-50 rounded-lg text-center align-middle">
                        <tr class="rounded-lg">
                            {{ $table_header }}
                            {{-- <th data-field="nama" data-filter-control="input"
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
                            </th> --}}
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 text-center align-middle">
                        {{ $table_column }}
                        {{-- @for ($i = 0; $i < 20; $i++)
                            <tr class="">
                                <td class="px-4 py-3 whitespace-nowrap align-middle break-words">
                                    Nur Laila Fitria {{ $i }}
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
                                        <a href="https://wa.me/628972529100" target="_blank" data-bs-container="body"
                                            data-bs-toggle="popover" data-bs-placement="top" data-bs-trigger="hover"
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
                        @endfor --}}
                    </tbody>
                </table>
            </div>


            <!-- Script -->


            <script>
                $(function() {
                    // Inisialisasi tabel
                    $('#{{ $id }}').bootstrapTable();

                    // Hilangkan pesan "Loading, please wait" kalau ada
                    $('.fixed-table-loading').hide();

                    // Fungsi search eksternal
                    $('#customSearchInput').on('keyup', function() {
                        const value = $(this).val().toLowerCase();
                        $('#{{ $id }} tbody tr').filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });
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


        </div>
    </div>

</div>
