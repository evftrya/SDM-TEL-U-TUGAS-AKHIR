@php
    $active_sidebar = '';
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
                    Edit Level
                </span>
            </div>
        </div>
    </div>
@endsection
@section('content-base')
    <x-form route="{{ route('manage.level.update-data',['idLevel'=>$idLevel]) }}" id="level-edit">
        <div class="grid gap-8 ">
            <!-- Kolom Kiri -->
            <div class="flex flex-col gap-4">
                <x-itxt :val="$level_target->nama_level" lbl="Nama Level" plc="Direktur" nm="nama_level" max=50 />

                {{-- <x-itxt :val="{{ $level_target->nama_level }}" lbl="Nama Level" plc="Direktur" nm="nama_level"/> --}}
                <x-itxt :val="$level_target->singkatan_level" lbl="Singkatan Level" plc="DIR" nm="singkatan_level" max=20/>
                

                <!-- <x-itxt lbl="Nama Level" plc="Direktur" nm='nama_level' val=""></x-itxt> -->
                {{-- <x-itxt lbl="Singkatan Level" plc="DIR" nm='singkatan_level'></x-itxt> --}}
                <x-islc lbl="Atasan Level" nm='atasan_level'>
                    @forelse($levels as $level)
                        <option value="{{ $level->id }}" {{ $level->id == $level_target->atasan_level ? 'selected' : '' }}>{{ $level->nama_level }}</option>
                    @empty
                        <option value="-" disabled>-- No Data --</option>
                    @endforelse
                </x-islc>
            </div>
        </div>
    </x-form>
@endsection
