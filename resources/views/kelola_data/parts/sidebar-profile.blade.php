<!-- Menu Kelola Data -->


@php
    $sidebars = [
        [
            ['Profile User','Profile'],
            [
                ['Personal Information', route('manage.pegawai.view.personal-info', ['idUser' => $user['id']]), 'fa-solid fa-users'],
                ['Employee Information', route('manage.pegawai.view.employee-info', ['idUser' =>  $user['id']] ), 'fa-solid fa-users'],
                ['Riwayat Jabatan', route('manage.pegawai.view.riwayat-jabatan', ['idUser' => $user['id'] ]), 'fa-solid fa-users'],
                // ['Import Pegawai', route('manage.pegawai.import'), 'fa-solid fa-file-import'],
                // ['Dashboard Pegawai', route('manage.pegawai.dashboard'), 'fa-solid fa-chart-line'],
            ],
        ]
    ];
@endphp


@foreach ($sidebars as $sidebar)
    <x-sidebar-group title="{{ $sidebar[0][0] }}" hide="{{$sidebar[0][1]}}" icon="fa-users">
        @foreach ($sidebar[1] as $button)
            <x-sidebar-button :isactive="$active_sidebar === $button[0]  ? 'active-sidebar' : null" href="{{ $button[1] }}" icon="{{ $button[2] }}" label="{{ $button[0] }}" />
        @endforeach
    </x-sidebar-group>
@endforeach
