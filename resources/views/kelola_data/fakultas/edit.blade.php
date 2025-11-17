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
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Edit Fakultas</span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Ubah data fakultas yang sudah ada
            </span>
        </div>
    </div>
@endsection

@section('content-base')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form method="POST" action="{{ route('manage.fakultas.update', $fakulta->id) }}">
                @csrf
                @method('PUT')

                <!-- Kode Fakultas -->
                <div class="mb-4">
                    <label for="kode" class="block text-sm font-semibold text-gray-700 mb-2">
                        Kode Fakultas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="kode" name="kode" value="{{ old('kode', $fakulta->kode) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition @error('kode') border-red-500 @enderror"
                        placeholder="Contoh: FTI">
                    @error('kode')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nama Fakultas -->
                <div class="mb-4">
                    <label for="nama_fakultas" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Fakultas <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_fakultas" name="nama_fakultas"
                        value="{{ old('nama_fakultas', $fakulta->nama_fakultas) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition @error('nama_fakultas') border-red-500 @enderror"
                        placeholder="Contoh: Fakultas Teknik Informatika">
                    @error('nama_fakultas')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Action -->
                <div class="flex items-center justify-end gap-3 mt-6">
                    <a href="{{ route('manage.fakultas.index') }}"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md text-sm font-medium hover:bg-blue-700 transition">
                        Update Fakultas
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
