<!-- Menu Kelola Data -->


@php
    $sidebars = [
        [
            ['Manajemen Data Pegawai','Pegawai'],
            [
                ['Dashboard Pegawai', route('manage.pegawai.list', ['destination' => 'All']), 'fa-solid fa-chart-line'],
                ['Daftar Pegawai', route('manage.pegawai.list', ['destination' => 'All']), 'fa-solid fa-users'],
                ['Tambah Pegawai Baru', route('manage.pegawai.new'), 'fa-solid fa-user-plus'],
                ['Import Pegawai', route('manage.pegawai.new'), 'fa-solid fa-file-import'],
            ],
        ],
        [
            ['Manajemen Fakultas','Fakultas'],
            [
                ['Daftar Fakultas', route('manage.fakultas.index'), 'fa-solid fa-building-columns'],
                ['Tambah Fakultas', route('manage.fakultas.create'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Manajemen Prodi','Prodi'],
            [
                ['Daftar Prodi', route('manage.prodi.index'), 'fa-solid fa-book-open'],
                ['Tambah Prodi', route('manage.prodi.create'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Manajemen Level','Level'],
            [
                ['Daftar Level', route('manage.level.list'), 'fa-solid fa-layer-group'],
                ['Tambah Level', route('manage.level.new'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Manajemen Formasi','Formasi'],
            [
                ['Daftar Formasi', route('manage.formasi.list'), 'fa-solid fa-table-list'],
                ['Tambah Formasi', route('manage.formasi.list'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Pengawakan','Pengawakan'],
            [
                ['Daftar Pengawakan', route('manage.pengawakan.list'), 'fa-solid fa-users-gear'],
                ['Tambah Pengawakan', route('manage.pengawakan.list'), 'fa-solid fa-user-plus'],
                ['Struktur Jabatan', route('manage.pengawakan.list'), 'fa-solid fa-sitemap'],
            ],
        ],
        [
            ['Laporan','Laporan'],
            [
                ['Laporan Pegawai Lengkap', route('manage.pegawai.list', ['destination' => 'All']), 'fa-solid fa-file-lines'],
            ],
        ],
    ];
@endphp


@foreach ($sidebars as $sidebar)
    <x-sidebar-group title="{{ $sidebar[0][0] }}" hide="{{$sidebar[0][1]}}" icon="fa-users">
        @foreach ($sidebar[1] as $button)
            <x-sidebar-button href="{{ $button[1] }}" icon="{{ $button[2] }}" label="{{ $button[0] }}" />
        @endforeach
    </x-sidebar-group>
@endforeach
