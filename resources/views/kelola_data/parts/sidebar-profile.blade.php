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
        ]
    ];
@endphp


@foreach ($sidebars as $sidebar)
    <x-sidebar-group title="{{ $sidebar[0][0] }}" hide="{{$sidebar[0][1]}}" icon="fa-users">
        @foreach ($sidebar[1] as $button)
            <x-sidebar-button href="{{ $button[1] }}" icon="{{ $button[2] }}" label="{{ $button[0] }}" />
        @endforeach
    </x-sidebar-group>
@endforeach
