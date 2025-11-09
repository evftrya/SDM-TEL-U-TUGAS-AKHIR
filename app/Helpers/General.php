<?php

use Illuminate\Support\Arr;

if (!function_exists('showDataOrDefault')) {
    /**
     * Ambil nilai dari array bersarang dengan path tertentu.
     * Jika tidak ada, kembalikan teks default.
     *
     * @param  array|object  $array
     * @param  string  $path  Contoh: 'pegawai_detail.data_tpa.nitk'
     * @param  string  $default
     * @return mixed
     */
    function showData($array, $path, $default = 'Belum ada data')
    {
        $value = data_get($array, $path);

        if (is_null($value) || $value === '') {
            return $default;
        }

        return $value;
    }
}
