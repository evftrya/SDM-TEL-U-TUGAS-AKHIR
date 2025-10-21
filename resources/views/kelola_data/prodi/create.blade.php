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
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Tambah Program Studi</span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Tambahkan program studi baru ke dalam sistem
            </span>
        </div>
    </div>
@endsection

@section('content-base')
    <div class="bg-white rounded-lg shadow-sm p-6 max-w-100">
        <form method="POST" action="{{ route('manage.prodi.store') }}">
            @csrf

            <!-- Fakultas -->
            <div class="mb-6">
                <label for="fakultas_id" class="block text-sm font-medium text-gray-700 mb-2">
                    Fakultas <span class="text-red-500">*</span>
                </label>
                <select id="fakultas_id" name="fakultas_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    required>
                    <option value="">Pilih Fakultas</option>
                    @foreach ($fakultas as $f)
                        <option value="{{ $f->id }}" {{ old('fakultas_id') == $f->id ? 'selected' : '' }}>
                            {{ $f->nama_fakultas }}
                        </option>
                    @endforeach
                </select>
                @error('fakultas_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Prodi -->
            <div class="mb-6">
                <label for="nama_prodi" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Program Studi <span class="text-red-500">*</span>
                </label>
                <input id="nama_prodi" type="text" name="nama_prodi" value="{{ old('nama_prodi') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    placeholder="Contoh: Teknik Informatika" required>
                @error('nama_prodi')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('manage.prodi.index') }}"
                    class="px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50 transition duration-200">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-[#0070ff] text-white rounded-md text-sm font-medium hover:bg-[#005fe0] transition duration-200">
                    <i class="bi bi-check-circle mr-1"></i>
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
