<!-- Menu Kelola Data -->


@php
    $sidebars = [
        [
            ['Manajemen Data Pegawai','Pegawai'],
            [
                ['Daftar Pegawai', route('manage.pegawai.list', ['destination' => 'something']), 'fa-solid fa-users'],
                ['Tambah Pegawai Baru', 'manage.pegawai.new', 'fa-solid fa-user-plus'],
                ['Import Pegawai', 'manage.pegawai.new', 'fa-solid fa-file-import'],
                ['Dashboard Pegawai', 'manage.pegawai.dashboard', 'fa-solid fa-chart-line'],
            ],
        ],
        [
            ['Managemen Data Dosen','Dosen'],
            [
                ['Daftar Dosen', 'manage.account.list', 'fa-solid fa-chalkboard-user'],
                ['Tambah Dosen Baru', 'manage.account.new', 'fa-solid fa-user-plus'],
                ['Import Dosen', 'manage.account.new', 'fa-solid fa-file-import'],
            ],
        ],
        [
            ['Managemen Fakultas','Facult'],
            [
                ['Daftar Fakultas', 'manage.account.list', 'fa-solid fa-building-columns'],
                ['Tambah Fakultas Baru', 'manage.account.new', 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen Program Studi','Prodi'],
            [
                ['Daftar Program Studi', 'manage.account.list', 'fa-solid fa-book-open'],
                ['Tambah Program Studi Baru', 'manage.account.new', 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen Level','Level'],
            [
                ['Daftar Level', 'manage.account.list', 'fa-solid fa-layer-group'],
                ['Tambah Level Baru', 'manage.account.new', 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen Pengawakan','Awak'],
            [
                ['Daftar Pengawakan', 'manage.account.list', 'fa-solid fa-users-gear'],
                ['Tambah Pengawakan Baru', 'manage.account.new', 'fa-solid fa-user-plus'],
            ],
        ],
        [
            ['Managemen Formasi','Formasi'],
            [
                ['Daftar Formasi', 'manage.account.list', 'fa-solid fa-table-list'],
                ['Tambah Formasi Baru', 'manage.account.new', 'fa-solid fa-circle-plus'],
            ],
        ],
        [
            ['Managemen COE','COE'],
            [
                ['Daftar COE', 'manage.account.list', 'fa-solid fa-diagram-project'],
                ['Tambah COE Baru', 'manage.account.new', 'fa-solid fa-circle-plus'],
                ['Import COE', 'manage.account.new', 'fa-solid fa-file-import'],
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
