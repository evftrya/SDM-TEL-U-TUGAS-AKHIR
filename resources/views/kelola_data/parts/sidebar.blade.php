<!-- Menu Kelola Data -->


@php
$sidebars = [
    ['Manajemen Data Pegawai',
        [
            ['Daftar Pegawai',  'manage.pegawai.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Pegawai Baru',  'manage.pegawai.new', 'fa-slab fa-regular fa-inbox'],
            ['Import Pegawai',  'manage.pegawai.new', 'fa-slab fa-regular fa-inbox'],
            ['Dashboard Pegawai',  'manage.pegawai.dashboard', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Data Dosen',
        [
            ['Daftar Dosen',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Dosen Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
            ['Import Dosen',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Fakultas',
        [
            ['Daftar Fakultas',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Fakultas Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Program Studi',
        [
            ['Daftar Program Studi',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Program Studi Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Level',
        [
            ['Daftar Level',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Level Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Pengawakan',
        [
            ['Daftar Pengawakan',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Pengawakan Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Formasi',
        [
            ['Daftar Formasi',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah Formasi Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen COE',
        [
            ['Daftar COE',  'manage.account.list', 'fa-slab fa-regular fa-inbox'],
            ['Tambah COE Baru',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
            ['Import COE',  'manage.account.new', 'fa-slab fa-regular fa-inbox'],
        ]
    ],

]
@endphp

@foreach ($sidebars as  $sidebar)
<x-sidebar-group title="{{$sidebar[0]}}" icon="fa-users">
    @foreach ($sidebar[1] as $button) 
    <x-sidebar-button href="{{route($button[1])}}" icon="{{$button[2]}}" label="{{$button[0]}}" />
    @endforeach
</x-sidebar-group>
@endforeach