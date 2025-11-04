<?php

namespace App\Models\Dupak;

class RefStatusPengajuan extends DupakModel
{
    protected $table = 'ref_status_pengajuan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'isActive'
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'statusPengajuanId');
    }

    public function riwayatStatus()
    {
        return $this->hasMany(RiwayatStatusPengajuan::class, 'statusPengajuanId');
    }
}