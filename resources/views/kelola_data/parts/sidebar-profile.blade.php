<!-- Menu Kelola Data -->


@php
    $sidebars = [
        [
            ['Profile User','Profile'],
            [
                ['Personal Information', (session('account')['is_admin']&&($user['id']!=session('account')['id']))?route('manage.pegawai.view.personal-info',['idUser' => $user['id']]):route('profile.personal-info', ['idUser' => session('account')['id']]), 'fa-solid fa-id-card'],
                // ['Riwayat Jabatan', (session('account')['is_admin']&&($user['id']!=session('account')['id']))?route('manage.pegawai.view.riwayat-jabatan',['idUser' => $user['id']]):route('profile.personal-info', ['idUser' => session('account')['id']]), 'fa-solid fa-timeline'],
                ['Ubah Password', (session('account')['is_admin']&&($user['id']!=session('account')['id']))?route('manage.pegawai.view.change-password', ['idUser' => $user['id'] ]):route('profile.change-password', ['idUser' => session('account')['id']]), 'fa-solid fa-key'],
            ],
        ]
    ];
@endphp
{{-- {{ dd((session('account')['is_admin']&&($user['id']!=session('account')['id'])),$user['id'],session('account')['id']) }} --}}
@foreach ($sidebars as $sidebar)
    <x-sidebar-group title="{{ $sidebar[0][0] }}" hide="{{$sidebar[0][1]}}" icon="fa-users">
        @foreach ($sidebar[1] as $button)
            <x-sidebar-button :isactive="$active_sidebar === $button[0]  ? 'active-sidebar' : null" href="{{ $button[1] }}" icon="{{ $button[2] }}" label="{{ $button[0] }}" />
        @endforeach
    </x-sidebar-group>
@endforeach
