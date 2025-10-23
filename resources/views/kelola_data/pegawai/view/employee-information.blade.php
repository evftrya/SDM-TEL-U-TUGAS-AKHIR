@extends('kelola_data.base-profile')
@section('profile-content')
    <div class="flex w-full flex-col gap-[18px]">
        <div class="flex items-center gap-[29px]"><span
                class="font-semibold text-[24.083213806152344px] leading-[20.44701385498047px] text-[#101828]">Employee
                Information</span>
            <div class="flex rounded-[4.830657005310059px]">
                <div
                    class="flex justify-center items-center gap-[4.830657005310059px] bg-[#0070ff] px-[9.661314010620117px] py-[6.038321495056152px] rounded-[4.830657005310059px] border-[0.6038321256637573px] border-solid border-[#0070ff]">
                    <span class="font-medium text-[8.453649520874023px] leading-[12.076642990112305px] text-white">Ubah
                        Data</span></div>
            </div>
        </div>
        <div class="flex gap-[73px] self-stretch">
            <div class="w-[262px] flex flex-col gap-[13px]">
                <div class="h-4 flex gap-[122px]"><span
                        class="font-light text-[18.014497756958008px] leading-[15.294581413269043px] text-black">Nomor Induk
                        Pegawai (NIP)</span></div><span
                    class="font-light text-[18.014497756958008px] leading-[15.294581413269043px] text-black">Jenis
                    Kepegawaian</span>
                <div class="flex gap-[122px] self-stretch h-4"><span
                        class="font-light text-[18.014497756958008px] leading-[15.294581413269043px] text-black">Status
                        Kepegawaian</span></div>
            </div>
            <div class="flex flex-col gap-[13px] grow">
                <div class="flex gap-[122px] self-stretch h-4"><span
                        class="font-normal text-[18.014497756958008px] leading-[15.294581413269043px] text-black">123165465421</span>
                </div><span
                    class="font-normal text-[18.014497756958008px] leading-[15.294581413269043px] text-black">TPA</span>
                <div class="h-4 flex gap-[122px]"><span
                        class="font-normal text-[18.014497756958008px] leading-[15.294581413269043px] text-black">Pegawai
                        Tetap</span></div>
            </div>
        </div>
    </div>
@endsection
