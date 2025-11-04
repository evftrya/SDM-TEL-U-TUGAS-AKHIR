<?php

namespace App\Models\Dupak;

class PengajuanDetail extends DupakModel
{
    protected $table = 'pengajuan_detail';
    protected $fillable = [
        'pengajuan_id',
        'kegiatan_id',
        'bukti',
        'angka_kredit',
        'angka_kredit_disetujui'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}