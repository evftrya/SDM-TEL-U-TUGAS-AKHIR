@php
    $active_sidebar = 'Tambah Formasi';
@endphp
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
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">
                    Tambah Formasi Baru
                </span>
            </div>
        </div>
    </div>
@endsection

@section('content-base')
    <x-form route="{{ route('manage.formasi.create') }}" id="level-input">
        <div class="grid gap-8 ">
            <!-- Kolom Kiri -->
            <div class="flex flex-col gap-4">
                <x-islc lbl="Level Formasi" nm='level_id' :req=true>
                    <option value="" disabled selected>-- Pilih Data --</option>
                    @forelse ($levels as $level)
                        <option value="{{ $level->id }}">{{ $level->nama_level }}</option>
                    @empty
                        <option value="-" disabled>-- No Data --</option>
                    @endforelse
                </x-islc>

                <x-itxt lbl="Nama Formasi" plc="Direktur" nm='nama_formasi' max="100"></x-itxt>
                <x-itxt type="number" lbl="Kuota" plc="DIR" nm='kuota' max="12"></x-itxt>

                <x-islc lbl="Atasan Formasi" nm='atasan_formasi_id' :req=false>
                    <option value="" disabled selected>-- Pilih Data --</option>
                    @forelse ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->nama_formasi }}</option>
                    @empty
                        <option value="-" disabled>-- No Data --</option>
                    @endforelse
                </x-islc>
                {{-- Tipe Bagian (PENTING: beri name untuk diakses JS) --}}
                <x-islc lbl="Tipe Bagian" nm="tipe_bagian">
                    <option value="" disabled selected>-- Pilih Data --</option>
                    <option value="Bagian">Bagian</option>
                    <option value="Prodi">Prodi</option>
                    <option value="Fakultas">Fakultas</option>
                </x-islc>

                {{-- Bungkus tiap field yang tergantung tipe dengan div agar bisa di-hide --}}
                <div id="wrap-bagian" class="hidden">
                    <x-islc lbl="Bagian / Unit Kerja" nm='bagian' :req=false>
                        <option value="" disabled selected>-- Pilih Data --</option>
                        @forelse ($bagians as $bagian)
                            <option value="{{ $bagian->id }}">{{ $bagian->nama_bagian }}</option>
                        @empty
                            <option value="-" disabled>-- No Data --</option>
                        @endforelse
                    </x-islc>
                </div>

                <div id="wrap-prodi" class="hidden">
                    <x-islc lbl="Program Studi" nm='prodi' :req=false>
                        <option value="" disabled selected>-- Pilih Data --</option>
                        @forelse ($prodis as $prodi)
                            <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                        @empty
                            <option value="-" disabled>-- No Data --</option>
                        @endforelse
                    </x-islc>
                </div>

                <div id="wrap-fakultas" class="hidden">
                    <x-islc lbl="Fakultas" nm='fakultas' :req=false>
                        <option value="" disabled selected>-- Pilih Data --</option>
                        @forelse ($fakultas as $fakult)
                            <option value="{{ $fakult->id }}">{{ $fakult->nama_fakultas }}</option>
                        @empty
                            <option value="-" disabled>-- No Data --</option>
                        @endforelse
                    </x-islc>
                </div>
            </div>
        </div>
    </x-form>

    {{-- JS sederhana untuk show/hide --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipeSelect = document.querySelector('select[name="tipe_bagian"]');
            const wrapBagian = document.getElementById('wrap-bagian');
            const wrapProdi = document.getElementById('wrap-prodi');
            const wrapFakultas = document.getElementById('wrap-fakultas');

            function toggleFields() {
                const val = tipeSelect.value;

                // hide semua dulu
                wrapBagian.classList.add('hidden');
                wrapProdi.classList.add('hidden');
                wrapFakultas.classList.add('hidden');

                if (val === 'Bagian') {
                    wrapBagian.classList.remove('hidden');
                } else if (val === 'Prodi') {
                    wrapProdi.classList.remove('hidden');
                } else if (val === 'Fakultas') {
                    wrapFakultas.classList.remove('hidden');
                }
            }

            tipeSelect.addEventListener('change', toggleFields);

            // inisialisasi (kalau ada old value / edit form)
            toggleFields();
        });
    </script>
@endsection
