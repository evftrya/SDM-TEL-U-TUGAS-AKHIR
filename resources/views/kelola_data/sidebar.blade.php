<!-- Menu Kelola Data -->


@php
    $sidebars = [
        [
            ['Manajemen Data Pegawai','Pegawai'],
            [
                ['Daftar Pegawai', route('manage.pegawai.list', ['destination' => 'All']), 'fa-solid fa-users'],
                ['Tambah Pegawai Baru', route('manage.pegawai.new'), 'fa-solid fa-user-plus'],
                // ['Import Pegawai', route('manage.pegawai.import'), 'fa-solid fa-file-import'],
                // ['Dashboard Pegawai', route('manage.pegawai.dashboard'), 'fa-solid fa-chart-line'],
            ],
        ],
        [
            ['Managemen Level','Level'],
            [
                ['Daftar Level', route('manage.level.list'), 'fa-solid fa-layer-group'],
                ['Tambah Level Baru', route('manage.level.new'), 'fa-solid fa-circle-plus'],
            ],
        ],
        
        [
            ['Managemen Formasi','Formasi'],
            [
                ['Daftar Formasi', route('manage.formasi.list'), 'fa-solid fa-table-list'],
                ['Tambah Formasi Baru', route('manage.formasi.list'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen Pengawakan','Awak'],
            [
                ['Daftar Pengawakan', route('manage.pengawakan.list'), 'fa-solid fa-users-gear'],
                ['Tambah Pengawakan Baru', route('manage.pengawakan.list'), 'fa-solid fa-user-plus'],
            ],
        ],
        [
            ['Managemen Data Dosen','Dosen'],
            [
                ['Daftar Dosen', route('manage.pegawai.list', ['destination' => 'Dosen']), 'fa-solid fa-chalkboard-user'],
                // ['Tambah Dosen Baru', route('manage.level.list'), 'fa-solid fa-user-plus'],
                // ['Import Dosen', route('manage.level.list'), 'fa-solid fa-file-import'],
            ],
        ],
        [
            ['Managemen Fakultas','Facult'],
            [
                ['Daftar Fakultas',  route('manage.fakultas.list'), 'fa-solid fa-building-columns'],
                ['Tambah Fakultas Baru', route('manage.fakultas.list'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen Program Studi','Prodi'],
            [
                // ['Daftar Program Studi', 'manage.prodi.list', 'fa-solid fa-book-open'],
                // ['Tambah Program Studi Baru', route('manage.prodi.list'), 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen COE','COE'],
            [
                // ['Daftar COE', 'manage.coe.list', 'fa-solid fa-diagram-project'],
                // ['Tambah COE Baru', route('manage.coe.list'), 'fa-solid fa-circle-plus'],
                // ['Import COE', route('manage.coe.list'), 'fa-solid fa-file-import'],
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
