@php
    $active_sidebar = 'Tambah Pegawai Baru';
@endphp

@extends('kelola_data.base')

@section('header-base')
    <style>
        .max-w-100 {
            max-width: 100% !important;
        }

        .nav-active {
            background-color: #0070ff;
        }

        .nav-active span {
            color: white;
        }
    </style>
@endsection

@section('page-name')
    <div
        class="flex flex-col md:flex-row items-center gap-[11.749480247497559px] self-stretch px-1 pt-[14.686850547790527px] pb-[13.952507972717285px]">
        <div class="flex w-full flex-col gap-[2.9373700618743896px] grow">
            <div class="flex items-center gap-[5.874740123748779px] self-stretch">
                <span class="font-medium text-2xl leading-[20.56159019470215px] text-[#101828]">
                    Tambah Pegawai Baru
                </span>
            </div>
        </div>
        <div class="flex items-center w-full justify-end gap-[11.749480247497559px]">
            <x-export-csv-tb target_id="pegawaiTable"></x-export-csv-tb>
        </div>
    </div>
@endsection

@section('content-base')
    <x-form route="{{ route('manage.pegawai.create') }}" id="pegawai-input">

        {{-- Data Diri --}}
        <div class="flex flex-col gap-8 w-full max-w-100 mx-auto rounded-md border p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Diri Pegawai</h2>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Kolom Kiri --}}
                <div class="flex flex-col gap-4">
                    <x-itxt lbl="Nama Lengkap" plc="John Doe" nm="nama_lengkap" max="100" required></x-itxt>

                    <x-itxt lbl="Username" plc="johndoe" nm="username" max="20" required></x-itxt>

                    <x-itxt lbl="Telepon" plc="081234567890" nm="telepon" max="13" :rules="['Harus dimulai dengan 0', 'berjumlah 10-13 digit']"></x-itxt>

                    <x-itxt type="textarea" lbl="Alamat" plc="Jl. Telekomunikasi No. 1, Bandung" nm="alamat"
                        max="300" fill="flex-grow"></x-itxt>
                </div>

                {{-- Kolom Kanan --}}
                <div class="flex flex-col gap-4">
                    <x-itxt type="email" lbl="Email Pribadi" plc="johndoe@gmail.com" nm="email_pribadi"
                        max="150"></x-itxt>

                    <x-itxt type="email" lbl="Email Institusi" plc="john.doe@telkomuniversity.ac.id" nm="email_institusi"
                        max="150"></x-itxt>

                    <x-islc lbl="Jenis Kelamin" nm="jenis_kelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </x-islc>

                    <div class="flex flex-col xl:flex-row justify-between w-full gap-3">
                        <x-itxt lbl="Tempat Lahir" fill="flex-1" plc="Surabaya" nm="tempat_lahir"></x-itxt>
                        <x-itxt type="date" fill="flex-1" lbl="Tanggal Lahir" nm="tgl_lahir" rules="none"></x-itxt>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row justify-between items-start gap-8 w-full max-w-100 md:mx-auto">
            {{-- Selector Tipe Pegawai (SELALU TAMPIL) --}}
            <div class="flex flex-col gap-8 flex-1 flex-grow w-full md:mx-auto rounded-md border p-3">

                {{-- <div class="w-full max-w-100 md:mx-auto rounded-md border p-3 my-8"> --}}
                <h2 class="text-lg font-semibold text-black text-center">Data Kepegawaian</h2>

                <x-islc lbl="Tipe Pegawai" nm="tipe_pegawai" id="tipe_pegawai" required>
                    <option value="" disabled>-- Pilih Tipe --</option>
                    <option value="Dosen" {{ old('tipe_pegawai', 'Dosen') === 'Dosen' ? 'selected' : '' }}>Dosen</option>
                    <option value="TPA" {{ old('tipe_pegawai') === 'TPA' ? 'selected' : '' }}>TPA</option>
                </x-islc>


                <x-itxt lbl="Nomor Induk Pegawai" plc="1234567890" nm="nip" max="30"></x-itxt>

                <x-itxt type="date" lbl="Tanggal Bergabung" plc="dd/mm/yyyy" nm="tgl_bergabung" rules="none"></x-itxt>

                <x-islc lbl="Status Kepegawaian" nm="status_kepegawaian">
                    @foreach ($status_pegawai_options as $status)
                        <option value="{{ $status->id }}" class="opsi-kepegawaian {{ $status->tipe_pegawai }}">
                            {{ $status->status_pegawai }}</option>
                    @endforeach
                </x-islc>
            </div>

            {{-- Data Kepegawaian (TPA) --}}
            <div class="hidden flex flex-col gap-8 flex-1 flex-grow min-h-full md:mx-auto rounded-md border p-3"
                id="data-tpa">
                <h2 class="text-lg font-semibold text-black text-center">Data TPA</h2>

                <div class="grid gap-8">
                    <div class="flex flex-col gap-4 sm:w-full">

                        <x-itxt lbl="Nomor Induk Tenaga Kerja (NITK)" plc="1234567890" nm="nitk"
                            max="15"></x-itxt>

                    </div>
                </div>
            </div>

            {{-- Data Dosen --}}
            <div class="flex flex-col gap-8 flex-1 flex-grow w-full min-h-full md:mx-auto rounded-md border p-3"
                id="data-dosen">
                <h2 class="text-lg font-semibold text-black text-center">Data Dosen</h2>

                <div class="grid gap-8">
                    <div class="flex flex-col gap-4 sm:w-full">
                        <x-itxt lbl="Nomor Induk Dosen Nasional (NIDN)" plc="12547651232" nm="nidn"
                            max="20"></x-itxt>

                        <x-itxt lbl="Nomor (NUPTK)" plc="1234567890" nm="nomor_induk_pegawai" max="30"></x-itxt>

                        <x-islc lbl="JFA Dosen" nm="jfa">
                            @foreach ($jenjang_jfa_options as $options)
                                <option value="{{ $options->id }}">
                                    {{ $options->pangkat }}</option>
                            @endforeach
                        </x-islc>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Pendidikan Pegawai --}}
        <div class="flex flex-col gap-8 w-full max-w-100 md:mx-auto rounded-md border p-3">
            <h2 class="text-lg font-semibold text-black text-center">Data Pendidikan Pegawai</h2>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Kolom Kiri --}}
                <div class="flex flex-col gap-4">
                    <x-islc lbl="Jenjang Pendidikan" nm="jenjang_pendidikan_id">
                        @foreach ($jenjang_pendidikan_options as $option)
                            <option value="{{ $option->id }}">{{ $option->jenjang_pendidikan }}</option>  
                        @endforeach
                    </x-islc>

                    <x-itxt lbl="Bidang Pendidikan / Fakultas" plc="Informatika" nm="bidang_pendidikan"
                        max="150"></x-itxt>

                    <x-itxt lbl="Jurusan / Program Studi" plc="Rekayasa Perangkat Lunak" nm="jurusan"
                        max="150"></x-itxt>

                    <x-itxt lbl="Nama Kampus" plc="Telkom University" nm="nama_kampus" max="150"></x-itxt>

                    <x-itxt lbl="Alamat Kampus" plc="Jl. Telekomunikasi No. 1, Bandung" nm="alamat_kampus"
                        max="150"></x-itxt>
                </div>

                {{-- Kolom Kanan --}}
                <div class="flex flex-col gap-4">
                    {{-- Note: untuk type=number, "max" adalah nilai maksimum, bukan panjang karakter --}}
                    <x-itxt type="number" lbl="Tahun Lulus" plc="2024" nm="tahun_lulus" min="1900"
                        max="{{ now()->year }}"></x-itxt>

                    {{-- IPK desimal --}}
                    <x-itxt type="number" lbl="Nilai IPK" plc="3.75" nm="nilai" step="0.01" min="0"
                        max="4" :rules="['maksimal ipk 4.00']" />


                    <div class="flex flex-col xl:flex-row justify-between w-full gap-3">
                        <x-itxt lbl="Gelar yang Didapat" plc="Sarjana Komputer" nm="gelar" max="50"></x-itxt>
                        <x-itxt lbl="Singkatan Gelar" plc="S.Kom." nm="singkatan_gelar" max="20"></x-itxt>
                    </div>

                    {{-- Ijazah / Sertifikat Kelulusan: upload file --}}
                    <label class="text-sm font-medium text-gray-700">Ijazah / Sertifikat Kelulusan (PDF/JPG)</label>
                    <input type="file" name="ijazah_file" accept=".pdf,.jpg,.jpeg,.png"
                        class="block w-full rounded-md border px-3 py-2 text-sm" />
                </div>
            </div>
        </div>
    </x-form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tipePegawai = document.querySelector('select[name="tipe_pegawai"]') || document.getElementById(
                'tipe_pegawai');
            const statusKepegawaian = document.querySelector('select[name="status_kepegawaian"]');
            const dataTPA = document.getElementById('data-tpa');
            const dataDosen = document.getElementById('data-dosen');

            if (!tipePegawai || !statusKepegawaian || !dataTPA || !dataDosen) {
                console.warn('Elemen penting tidak ditemukan.');
                return;
            }

            // Simpan semua opsi asli (termasuk classes)
            const originalStatusOptions = Array.from(statusKepegawaian.options).map(opt => ({
                value: opt.value,
                text: opt.text,
                disabled: opt.disabled,
                classes: opt.className, // contoh: "opsi-kepegawaian Dosen"
                selected: opt.selected
            }));

            function setSectionRequired(sectionEl, isRequired) {
                if (!sectionEl) return;
                const fields = sectionEl.querySelectorAll('input:not([type="hidden"]), select, textarea');
                fields.forEach(el => {
                    if (isRequired) {
                        el.setAttribute('required', 'required');
                        el.setAttribute('aria-required', 'true');
                    } else {
                        el.removeAttribute('required');
                        el.removeAttribute('aria-required');
                    }
                });
            }

            function showHideByType(type) {
                if (type === 'Dosen') {
                    dataDosen.classList.remove('hidden');
                    dataTPA.classList.add('hidden');
                    setSectionRequired(dataDosen, true);
                    setSectionRequired(dataTPA, false);
                } else if (type === 'TPA') {
                    dataTPA.classList.remove('hidden');
                    dataDosen.classList.add('hidden');
                    setSectionRequired(dataTPA, true);
                    setSectionRequired(dataDosen, false);
                } else {
                    // fallback: sembunyikan keduanya
                    dataTPA.classList.add('hidden');
                    dataDosen.classList.add('hidden');
                    setSectionRequired(dataTPA, false);
                    setSectionRequired(dataDosen, false);
                }
            }

            function renderStatusOptions(type) {
                // Simpan value yang sedang dipilih agar tetap jika masih valid
                const currentVal = statusKepegawaian.value;

                // Bersihkan opsi
                statusKepegawaian.innerHTML = '';

                // Tambah placeholder
                const ph = document.createElement('option');
                ph.value = '';
                ph.textContent = '-- Pilih Status --';
                ph.disabled = true;
                ph.selected = true;
                statusKepegawaian.appendChild(ph);

                // Filter opsi berdasarkan class yang mengandung tipe (Dosen/TPA)
                const filtered = originalStatusOptions.filter(opt =>
                    // Hanya opsi yang punya class tipe_pegawai yang dipilih
                    opt.classes && opt.classes.split(/\s+/).includes(type)
                );

                filtered.forEach(opt => {
                    const o = document.createElement('option');
                    o.value = opt.value;
                    o.textContent = opt.text;
                    o.className = opt.classes;
                    statusKepegawaian.appendChild(o);
                });

                // Jika sebelumnya sudah memilih value yang masih ada di filtered, pilih lagi
                if (filtered.some(o => o.value === currentVal)) {
                    statusKepegawaian.value = currentVal;
                    ph.selected = false;
                }
            }

            function handleTypeChange() {
                const type = tipePegawai.value;
                renderStatusOptions(type);
                showHideByType(type);
            }

            // Inisialisasi saat load (menghormati default old('tipe_pegawai', 'Dosen'))
            handleTypeChange();

            // Re-render saat tipe pegawai berubah
            tipePegawai.addEventListener('change', handleTypeChange);
        });
    </script>
@endsection
