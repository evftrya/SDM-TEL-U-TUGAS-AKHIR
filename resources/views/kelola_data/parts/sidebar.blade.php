<!-- Menu Kelola Data -->


@php
$sidebars = [
    ['Manajemen Akun',
        [
            ['Daftar Akun',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Akun',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Manajemen Data Pegawai',
        [
            ['Daftar Pegawai',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Pegawai Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
            ['Import Pegawai',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
            ['Dashboard Pegawai',  route('manage.account.dashboard'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Data Dosen',
        [
            ['Daftar Dosen',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Dosen Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
            ['Import Dosen',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Fakultas',
        [
            ['Daftar Fakultas',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Fakultas Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Program Studi',
        [
            ['Daftar Program Studi',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Program Studi Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Level',
        [
            ['Daftar Level',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Level Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Pengawakan',
        [
            ['Daftar Pengawakan',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Pengawakan Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen Formasi',
        [
            ['Daftar Formasi',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah Formasi Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],
    ['Managemen COE',
        [
            ['Daftar COE',  route('manage.account.list'), 'fa-slab fa-regular fa-inbox'],
            ['Tambah COE Baru',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
            ['Import COE',  route('manage.account.new'), 'fa-slab fa-regular fa-inbox'],
        ]
    ],

]
@endphp

@foreach ($sidebars as  $sidebar)
<x-sidebar-group title="{{$sidebar[0]}}" icon="fa-users">
    @foreach ($sidebar[1] as $button) 
    <x-sidebar-button href="/{{$button[1]}}" icon="{{$button[2]}}" label="{{$button[0]}}" />
    @endforeach
</x-sidebar-group>
@endforeach