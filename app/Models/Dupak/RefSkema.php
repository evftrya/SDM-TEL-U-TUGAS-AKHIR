<?php

namespace App\Models\Dupak;

class RefSkema extends DupakModel
{
    protected $table = 'ref_skema';

    protected $fillable = [
        'nama',
        'deskripsi',
        'isActive'
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'skemaId');
    }

    public function kegiatanKomponen()
    {
        return $this->hasMany(RefKegiatanKomponen::class, 'skemaId');
    }
}