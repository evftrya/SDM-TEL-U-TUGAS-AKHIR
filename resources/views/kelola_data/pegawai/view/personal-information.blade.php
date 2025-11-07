@php
    use App\Helpers\PhoneHelper;
    $active_sidebar = 'Personal Information';
@endphp

@extends('kelola_data.base-profile')

@section('content-profile')
    <style>
        .bg-primary-bs {
            background-color: #1C2762 !important;
        }

        /* Ukuran teks disesuaikan */
        /* .profile-wrapper {
                    font-size: 16px;
                    line-height: 1.7;
                }
                .profile-wrapper dt {
                    font-size: 14px;
                }
                .profile-wrapper dd {
                    font-size: 16px;
                }
                .profile-wrapper h2 {
                    font-size: 20px;
                }
                .profile-wrapper h3 {
                    font-size: 18px;
                } */
    </style>

    <div class="w-full max-w-full profile-wrapper">
        {{-- Content Layout --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

            {{-- Left column: Identity card --}}
            <section class="lg:col-span-1 min-h-full">
                <div
                    class="rounded-2xl border min-h-full border-gray-200 bg-white p-6 shadow-md dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex items-start gap-4">
                        <div
                            class="h-20 w-20 shrink-0 overflow-hidden rounded-xl bg-gradient-to-br from-indigo-500 to-purple-600 text-white ring-2 ring-white dark:ring-gray-900">
                            <div class="flex h-full w-full items-center justify-center text-2xl font-semibold">TA</div>
                        </div>
                        <div class="min-w-0">
                            <h2 class="truncate font-semibold text-gray-900 dark:text-gray-100">
                                {{ $user['nama_lengkap'] }}</h2>
                            <p class="truncate text-gray-500 dark:text-gray-400">Tirex Alfred, S.T., M.T.</p>
                        </div>
                    </div>

                    <dl class="mt-8 space-y-4">
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-gray-500 dark:text-gray-400">Username</dt>
                            <dd class="truncate font-medium text-gray-900 dark:text-gray-100">{{ $user['username'] }}</dd>
                        </div>
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-gray-500 dark:text-gray-400">Password</dt>
                            <dd class="truncate font-medium text-gray-900 dark:text-gray-100">********</dd>
                        </div>
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-gray-500 dark:text-gray-400">NIK</dt>
                            <dd class="truncate font-medium text-gray-900 dark:text-gray-100">
                                {{ $user['nik'] }}</dd>
                        </div>
                        <div class="flex items-start justify-between gap-4">
                            <dt class="text-gray-500 dark:text-gray-400">NIP</dt>
                            <dd class="truncate font-medium text-gray-900 dark:text-gray-100">
                                {{ $user['pegawai_detail']['nip'] }}</dd>
                        </div>

                        @if ($user['pegawai_detail']['status_pegawai']['tipe_pegawai'] === 'Dosen')
                            <div class="flex items-start justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">NIDN</dt>
                                <dd class="truncate font-medium text-gray-900 dark:text-gray-100">
                                    {{ $user['pegawai_detail']['data_dosen']['nidn'] }}</dd>
                            </div>
                            <div class="flex items-start justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">NUPTK</dt>
                                <dd class="truncate font-medium text-gray-900 dark:text-gray-100">
                                    {{ $user['pegawai_detail']['data_dosen']['nuptk'] }}</dd>
                            </div>
                        @else
                            <div class="flex items-start justify-between gap-4">
                                <dt class="text-gray-500 dark:text-gray-400">NITK</dt>
                                <dd class="truncate font-medium text-gray-900 dark:text-gray-100">
                                    {{-- {{ dd($user['pegawai_detail']['data_tpa']) }} --}}
                                    {{ $user['pegawai_detail']['data_tpa']['nitk'] }}</dd>
                            </div>
                        @endif
                    </dl>

                    <div class="flex justify-center items-center mt-10">
                        @if ($user['is_active'] == true)
                            <form id="form-nonaktif-{{ $user['id'] }}"
                                action="{{ route('manage.pegawai.set-non-active', ['idUser' => $user['id']]) }}"
                                method="POST" class="inline">
                                @csrf
                                <a href="#"
                                    onclick="event.preventDefault(); konfirmasiNonaktif('{{ $user['id'] }}')"
                                    class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-gradient-to-b from-gray-100 to-gray-50
                                px-3.5 py-2 text-xs font-medium text-gray-700 shadow-sm hover:from-gray-200 hover:to-gray-100
                                focus:outline-none focus:ring-2 focus:ring-gray-400 active:scale-95 transition-all duration-200
                                dark:from-gray-800 dark:to-gray-700 dark:text-gray-100">
                                    <i class="fa-solid fa-power-off text-[13px] text-[#EF4444]"></i>
                                    Nonaktifkan Akun
                                </a>
                            </form>
                        @else
                            <form id="form-aktif-{{ $user['id'] }}"
                                action="{{ route('manage.pegawai.set-active', ['idUser' => $user['id']]) }}" method="POST"
                                class="inline">
                                @csrf
                                <a href="#" onclick="event.preventDefault(); konfirmasiAktif('{{ $user['id'] }}')"
                                    class="inline-flex items-center gap-2 rounded-lg border border-green-200 
                                bg-gradient-to-b from-green-100 to-green-50 px-3.5 py-2 text-xs font-medium text-green-700 
                                shadow-sm hover:from-green-200 hover:to-green-100 focus:outline-none focus:ring-2 
                                focus:ring-green-400 active:scale-95 transition-all duration-200
                                dark:from-green-800 dark:to-green-700 dark:text-green-100">
                                    <i class="fa-solid fa-power-off text-[13px] text-[#10B981]"></i>
                                    Aktifkan Akun
                                </a>
                            </form>
                        @endif
                    </div>



                </div>
            </section>

            {{-- Right column: details --}}
            <section class="lg:col-span-2 space-y-8">

                {{-- Section: Data Personal --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white pt-0 p-6 shadow-md dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-6 flex items-center justify-between gap-2">
                        <h3 class="font-semibold tracking-wide shadow-sm py-3 px-5 rounded-b-lg bg-blue-500 text-white dark:text-gray-100">Data Personal</h3>
                        <div class="flex md:items-center pt-2 items-end justify-end gap-2">
                            <a href="#"
                                class="inline-flex items-center gap-2 rounded-lg bg-gradient-to-b border-blue-200 border-1 px-3.5 py-2 text-xs font-medium text-blue-600 shadow-sm hover:from-blue-500 hover:to-blue-400 hover:text-white active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all duration-200">
                                ✏️ <span>Ubah Data</span>
                            </a>
                        </div>
                    </div>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Nama Lengkap</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['nama_lengkap'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tempat Lahir</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['tempat_lahir'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tanggal Lahir</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['tgl_lahir'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Kelamin</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['jenis_kelamin'] }}</dd>
                        </div>

                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Alamat</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['alamat'] }}</dd>
                        </div>
                    </dl>
                </div>

                {{-- Section: Kontak --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white pt-0 p-6 shadow-md dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="font-semibold tracking-wideshadow-sm py-3 px-5 rounded-b-lg bg-blue-500 text-white dark:text-gray-100">Kontak</h3>
                    </div>

                    <dl class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-5">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Email Institusi</dt>
                            <dd class="mt-1 flex items-center gap-2 font-medium text-gray-900 dark:text-gray-100">
                                <a onclick="navigator.clipboard.writeText({{ $user['email_institusi'] }})"
                                    class="hover:underline w-fit">{{ $user['email_institusi'] }}</a>
                                <button type="button"
                                    class="ml-1 rounded-md border border-gray-300 px-2 py-0.5 text-sm text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 copy"
                                    onclick="navigator.clipboard.writeText({{ $user['email_institusi'] }})">Salin</button>
                            </dd>
                        </div>
                        <div>
                            <dt class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                                Email Pribadi
                                @if ($user['email_verified_at'] == null)
                                    <span
                                        class="inline-flex items-center rounded-full bg-red-50 px-2 py-0.5 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-200 dark:bg-red-950/40 dark:text-red-200 dark:ring-red-900">
                                        Belum terverifikasi
                                    </span>
                                @endif
                            </dt>
                            <dd class="mt-1 flex items-center gap-3 font-medium text-gray-900 dark:text-gray-100">
                                <a href="mailto:{{ $user['email_pribadi'] }}"
                                    class="hover:underline">{{ $user['email_pribadi'] }}</a>
                                <button type="button"
                                    class="ml-1 rounded-md border border-gray-300 px-2 py-0.5 text-sm text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 copy"
                                    onclick="navigator.clipboard.writeText({{ $user['email_pribadi'] }})">Salin</button>
                            </dd>
                        </div>
                        <div class="flex flex-row justify-start items-end gap-3">
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">No Handphone</dt>
                                <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">{{ $user['telepon'] }}</dd>
                            </div>
                            <button type="button"
                                class="ml-1 rounded-md border border-gray-300 px-2 py-0.5 text-sm text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 copy"
                                onclick="navigator.clipboard.writeText({{ $user['telepon'] }})">Salin</button>
                        </div>
                    </dl>
                </div>

                {{-- Section: Emergency Contact --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-6 shadow-md dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="font-semibold tracking-wide text-gray-900 dark:text-gray-100">Kontak Darurat</h3>
                    </div>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-5">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">No Telepon Darurat</dt>
                            <dd class="mt-1 flex items-center gap-3 font-medium text-gray-900 dark:text-gray-100">
                                @if ($user['emergency_contact_phone'])
                                    <a href="https://wa.me/{{ PhoneHelper::toIntlID($user['emergency_contact_phone']) }}"
                                        class="hover:underline">{{ $user['emergency_contact_phone'] }}</a>
                                    <button type="button"
                                        class="ml-1 rounded-md border border-gray-300 px-2 py-0.5 text-sm text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 copy"
                                        onclick="navigator.clipboard.writeText('{{ $user['emergency_contact_phone'] }}')">Salin</button>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>

                {{-- Section: Status Kepegawaian --}}
                <div
                    class="rounded-2xl border border-gray-200 bg-white pt-0 p-6 shadow-md dark:border-gray-800 dark:bg-gray-900">
                    <div class="mb-6 flex items-start justify-start">
                        <h3 class="font-semibold tracking-wide py-3 shadow-sm px-5 rounded-b-lg bg-blue-500 text-white dark:text-gray-100">Data
                            Kepegawaian</h3>
                    </div>
                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 mb-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Nomor Induk Pegawai (NIP)</dt>
                            <dd class="mt-1 font-semibold text-gray-900">{{ $user['pegawai_detail']['nip'] }}</dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Status Kepegawaian</dt>
                            <dd class="mt-1">
                                <span
                                    class="inline-flex items-center rounded-full bg-emerald-50 px-3 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-200">
                                    {{ $user['pegawai_detail']['status_pegawai']['status_pegawai'] }}
                                </span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Jenis Kepegawaian</dt>
                            <dd class="mt-1">
                                <span
                                    class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-200">
                                    {{ $user['tipe_pegawai'] }}
                                </span>
                            </dd>
                        </div>
                    </dl>

                    <dl class="grid grid-cols-1 gap-x-8 gap-y-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-gray-500 dark:text-gray-400">Tanggal Bergabung</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">
                                {{ $user['pegawai_detail']['tmt_mulai'] }}
                            </dd>
                        </div>
                        @if ($user['pegawai_detail']['tmt_selesai'] != null)
                            <div>
                                <dt class="text-gray-500 dark:text-gray-400">Tanggal Berhenti</dt>
                                <dd class="mt-1 font-medium text-gray-900 dark:text-gray-100">-</dd>
                            </div>
                        @endif
                    </dl>
                </div>

                {{-- Section: Catatan --}}
                <div
                    class="rounded-2xl border border-dashed border-gray-200 bg-gray-50 p-6 text-gray-600 dark:border-gray-800 dark:bg-gray-900/40 dark:text-gray-300">
                    <p>
                        Tip: Gunakan tombol
                        <span class="rounded bg-gray-200 px-2 py-0.5 text-xs dark:bg-gray-800">Salin</span>
                        untuk cepat menyalin email. Klik
                        <span
                            class="rounded bg-blue-100 px-2 py-0.5 text-xs text-blue-700 dark:bg-blue-950/40 dark:text-blue-200">Ubah
                            Data</span>
                        untuk memperbarui informasi.
                    </p>
                </div>
            </section>
        </div>
    </div>

    <!-- Toast -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="copyToast" class="toast align-items-center bg-blue-950 border-0" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body text-white" id="copyToastBody">
                    Teks berhasil disalin ke clipboard!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const copyButtons = document.querySelectorAll('.copy');
            const toastEl = document.getElementById('copyToast');
            const toastBody = document.getElementById('copyToastBody');
            const toast = new bootstrap.Toast(toastEl, {
                delay: 2000,
                autohide: true
            });

            copyButtons.forEach(button => {
                button.addEventListener('click', function() {
                    if (!navigator.clipboard) {
                        toastBody.textContent = '⚠️ Browser tidak mendukung Clipboard API.';
                        toastEl.classList.add('bg-blue-950');
                        toast.show();
                        return;
                    }

                    setTimeout(async () => {
                        try {
                            toastBody.textContent =
                                'Teks berhasil disalin ke clipboard!';
                            toastEl.classList.remove('bg-danger');
                            toastEl.classList.add('bg-blue-950');
                            toast.show();
                        } catch (err) {
                            toastBody.textContent = 'Gagal mengakses clipboard.';
                            toastEl.classList.remove('bg-blue-950');
                            toastEl.classList.add('bg-danger');
                            toast.show();
                        }
                    }, 150);
                });
            });
        });
    </script>
@endsection
