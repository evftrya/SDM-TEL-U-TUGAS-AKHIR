<?php

namespace App\Helpers;

class PhoneHelper
{
    /**
     * Konversi nomor HP Indonesia menjadi format internasional +62
     *
     * @param string $number
     * @return string|false
     */
    public static function toIntlID(string $number)
    {
        // Hapus spasi dan karakter selain angka atau plus
        $clean = trim($number);
        $clean = preg_replace('/[^\d+]/', '', $clean);

        // Jika sudah +62
        if (preg_match('/^\+62\d+$/', $clean)) {
            return $clean;
        }

        // Jika diawali 0
        if (preg_match('/^0\d+$/', $clean)) {
            return '+62' . substr($clean, 1);
        }

        // Jika diawali 62 tanpa plus
        if (preg_match('/^62\d+$/', $clean)) {
            return '+' . $clean;
        }

        // Jika format lain tapi valid (+ diikuti angka)
        if (preg_match('/^\+\d+$/', $clean)) {
            return $clean;
        }

        // Format tidak dikenali
        return false;
    }
}
