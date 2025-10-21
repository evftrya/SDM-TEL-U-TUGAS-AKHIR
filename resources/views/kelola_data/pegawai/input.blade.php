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
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">
                    Tambah Pegawai Baru
                </span>
            </div>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <x-export-csv-tb target_id="pegawaiTable"></x-export-csv-tb>
        </div>
    </div>
@endsection
@section('content-base')
    <form action="" class="flex flex-col gap-11 w-full max-w-100 mx-auto" method="POST">
        @csrf
        <div class="flex flex-col gap-8 w-full max-w-100 mx-auto rounded-md border-1 p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Diri Pegawai</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-4">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Nama Lengkap *</label>
                        <input type="text" placeholder="John Doe" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Username -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Username *</label>
                        <input type="text" placeholder="loremnf" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- No HP -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">No HP *</label>
                        <input type="text" placeholder="0865245125" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Alamat -->
                    <div class="flex flex-col gap-1 flex-grow-1">
                        <label class="text-sm text-gray-600 font-medium">Alamat *</label>
                        <textarea rows="4" placeholder="Masukkan alamat lengkap" required
                            class="border flex-grow-1 border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400"></textarea>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-4 ">
                    <!-- Email Pribadi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Email Pribadi *</label>
                        <input type="email" placeholder="johndoe@gmail.com" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Email Institusi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Email Institusi *</label>
                        <input type="email" placeholder="john.doe@institusi.ac.id" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Jenis Kelamin *</label>
                        <select
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="flex flex-col xl:flex-row justify-between w-full gap-3">
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">Tempat Lahir *</label>
                            <input type="text" placeholder="Surabaya" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">Tanggal Lahir *</label>
                            <input type="date" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                    </div>

                    <!-- Tipe Pegawai -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Tipe Pegawai</label>
                        <select
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            <option>Dosen</option>
                            <option>TPA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full flex flex-col md:flex-row gap-8">
            <div class="flex flex-col gap-8 flex-grow-1 md:mx-auto rounded-md border-1 p-3">
                <h2 class="text-lg font-semibold text-black text-center">Data Kepegawaian</h2>

                <div class="grid gap-8">
                    <!-- Kolom Kiri -->
                    <div class="flex flex-col gap-4 sm:w-full">
                        <!-- Nama Lengkap -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-gray-600 font-medium">Nomor Induk Pegawai *</label>
                            <input type="text" placeholder="John Doe" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>

                        <!-- Username -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-gray-600 font-medium">Status Kepegawaian *</label>
                            <input type="text" placeholder="loremnf" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-8 flex-grow-1 md:mx-auto rounded-md border-1 p-3">
                <h2 class="text-lg font-semibold text-black text-center">Data Jabatan</h2>

                <div class="grid gap-8">
                    <!-- Kolom Kiri -->
                    <div class="flex flex-col gap-4 sm:w-full">
                        <!-- Nama Lengkap -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-gray-600 font-medium">Formasi yang dijabat *</label>
                            <input type="text" placeholder="John Doe" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>

                        <!-- Username -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-gray-600 font-medium">TMT Mulai *</label>
                            <input type="text" placeholder="loremnf" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>

                        <!-- No HP -->
                        <div class="flex flex-col gap-1">
                            <label class="text-sm text-gray-600 font-medium">No SK *</label>
                            <input type="text" placeholder="0865245125" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8 w-full max-w-100 mx-auto rounded-md border-1 p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Pendidikan Pegawai</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-4">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Jenjang Pendidikan</label>
                        <select
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            <option>D3</option>
                            <option>S1/D4</option>
                            <option>S2</option>
                            <option>S3</option>
                        </select>
                    </div>

                    <!-- Username -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Bidang Pendidikan / Fakultas *</label>
                        <input type="text" placeholder="Informatika" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- No HP -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Jurusan / Program Studi *</label>
                        <input type="text" placeholder="Software Otomation" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Alamat -->
                    <div class="flex flex-col gap-1 flex-grow-1">
                        <label class="text-sm text-gray-600 font-medium">Nama Universitas *</label>
                        <input type="email" placeholder="Telkom University" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-4 ">
                    <!-- Email Pribadi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Tahun Lulus *</label>
                        <input type="email" placeholder="2004" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Email Institusi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Nilai IPK *</label>
                        <input type="email" placeholder="3.5" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="flex flex-col xl:flex-row justify-between w-full gap-3">
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">Gelar yang Didapat *</label>
                            <input type="text" placeholder="Sarjana Komputer" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">Singkatan gelar *</label>
                            <input type="text" placeholder="S. Kom." required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                    </div>

                    <!-- Tipe Pegawai -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Ijazah/Sertifikat Kelulusan* </label>
                        <select
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                            <option>Dosen</option>
                            <option>TPA</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-8 w-full  mx-auto rounded-md border-1 p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Sertifikasi Pegawai (Opsional)</h2>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Kolom Kiri -->
                <div class="flex flex-col gap-4">
                    <!-- Nama Lengkap -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Nomor Registrasi* </label>
                        <input type="text" placeholder="Informatika" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Username -->
                    <div class="flex flex-col xl:flex-row justify-between w-full gap-3">
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">No SK *</label>
                            <input type="text" placeholder="HDGFB8SDKSJBDSDS" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                        <div class="flex flex-col gap-1 flex-grow-1">
                            <label class="text-sm text-gray-600 font-medium">Tanggal SK *</label>
                            <input type="date" required
                                class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        </div>
                    </div>

                    <!-- No HP -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Nama Sertifikasi *</label>
                        <input type="text" placeholder="Software Otomation" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-g ray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="flex flex-col gap-4 ">
                    <!-- Email Pribadi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Diselenggarakan Oleh *</label>
                        <input type="email" placeholder="2004" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>

                    <!-- Email Institusi -->
                    <div class="flex flex-col gap-1">
                        <label class="text-sm text-gray-600 font-medium">Sertifikat Sertifikasi *</label>
                        <input type="email" placeholder="3.5" required
                            class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                    </div>
                </div>
            </div>
        </div>




        <!-- Tombol Submit -->
        <div class="flex justify-end mt-6">
            <button type="submit"
                class="px-6 py-2 bg-black text-white rounded-md font-medium hover:bg-gray-800 transition">
                Simpan Data
            </button>
        </div>
    </form>
@endsection
