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

        .detail-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }

        .detail-row {
            display: flex;
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #374151;
            width: 200px;
            flex-shrink: 0;
        }

        .detail-value {
            color: #1f2937;
            flex: 1;
        }
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">Detail Program Studi</span>
            </div>
            <span class="font-normal text-[10.280795097351074px] leading-[14.686850547790527px] text-[#1f2028]">
                Informasi lengkap tentang program studi
            </span>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <a href="{{ route('manage.prodi.index') }}" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-gray-500 px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-gray-500 hover:bg-gray-600 transition">
                    <i class="bi bi-arrow-left text-sm text-white"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-white">Kembali</span>
                </div>
            </a>
            <a href="{{ route('manage.prodi.edit', $prodi->id) }}" class="flex rounded-[5.874740123748779px]">
                <div
                    class="flex justify-center items-center gap-[5.874740123748779px] bg-[#0070ff] px-[11.749480247497559px] py-[7.343425273895264px] rounded-[5.874740123748779px] border border-[#0070ff] hover:bg-[#005fe0] transition">
                    <i class="bi bi-pencil text-sm text-white"></i>
                    <span class="font-medium text-[10.28px] leading-[14.68px] text-white">Edit</span>
                </div>
            </a>
        </div>
    </div>
@endsection

@section('content-base')
    <!-- Informasi Dasar -->
    <div class="detail-card mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Informasi Dasar</h3>
        </div>
        <div>
            <div class="detail-row">
                <div class="detail-label">Kode Prodi</div>
                <div class="detail-value">{{ $prodi->id }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Nama Program Studi</div>
                <div class="detail-value">{{ $prodi->nama_prodi }}</div>
            </div>
            <div class="detail-row">
                <div class="detail-label">Fakultas</div>
                <div class="detail-value">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        {{ $prodi->fakultas->nama_fakultas ?? '-' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Dosen -->
    <div class="detail-card mb-6">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Dosen</h3>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                Total: {{ $prodi->dosen->count() }} Dosen
            </span>
        </div>
        <div class="p-6">
            @if ($prodi->dosen->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NIDN</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Lengkap</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis Kelamin</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($prodi->dosen as $index => $dosen)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $dosen->nidn ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $dosen->pegawai->gelar_depan ?? '' }}
                                        {{ $dosen->pegawai->nama_lengkap ?? '-' }}
                                        {{ $dosen->pegawai->gelar_belakang ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $dosen->pegawai->jenis_kelamin ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Aktif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <i class="bi bi-people text-5xl text-gray-300 mb-3"></i>
                    <p class="text-gray-500 text-sm">Belum ada dosen yang terdaftar di program studi ini</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-end gap-3 mt-6">
        <form action="{{ route('manage.prodi.destroy', $prodi->id) }}" method="POST" class="inline-block"
            onsubmit="return confirm('Apakah Anda yakin ingin menghapus program studi ini? Data dosen yang terkait mungkin terpengaruh.');">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="flex items-center gap-2 px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium hover:bg-red-700 transition duration-200">
                <i class="bi bi-trash"></i>
                <span>Hapus Program Studi</span>
            </button>
        </form>
    </div>
@endsection
