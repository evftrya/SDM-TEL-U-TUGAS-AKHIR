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
    <form class="flex flex-col gap-8 w-full max-w-100 mx-auto">
        <h2 class="text-lg font-normal text-black text-center">Data Diri Pegawai</h2>

        <div class="grid grid-cols-2 gap-8">
            <!-- Kolom Kiri -->
            <div class="flex flex-col gap-4">
                <!-- Nama Lengkap -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Nama Lengkap *</label>
                    <input type="text" placeholder="John Doe"
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>

                <!-- Username -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Username *</label>
                    <input type="text" placeholder="loremnf"
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>

                <!-- No HP -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">No HP *</label>
                    <input type="text" placeholder="0865245125"
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>

                <!-- Alamat -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Alamat *</label>
                    <textarea rows="4" placeholder="Masukkan alamat lengkap"
                        class="border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400"></textarea>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="flex flex-col gap-4">
                <!-- Email Pribadi -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Email Pribadi *</label>
                    <input type="email" placeholder="johndoe@gmail.com"
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>

                <!-- Email Institusi -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Email Institusi *</label>
                    <input type="email" placeholder="john.doe@institusi.ac.id"
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
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Tanggal Lahir *</label>
                    <input type="date"
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                </div>

                <!-- Tipe Pegawai -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-gray-600 font-medium">Tipe Pegawai</label>
                    <select
                        class="h-10 border border-gray-300 rounded-md px-3 text-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-400">
                        <option>Dosen/TPA</option>
                        <option>Staf Administrasi</option>
                        <option>Tenaga Teknis</option>
                        <option>Lainnya</option>
                    </select>
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
