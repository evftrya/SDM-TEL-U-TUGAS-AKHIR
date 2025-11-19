<?php

namespace App\Models\Dupak;

class RefKegiatanUtama extends DupakModel
{
    protected $table = 'ref_kegiatan_utama';
    protected $fillable = [
        'nama',
        'status'
    ];

    public function komponens()
    {
        return $this->hasMany(RefKegiatanKomponen::class, 'idKegiatanUtama');
    }

    public function regulasiKumKomponen()
    {
        return $this->hasMany(RefRegulasiKumKomponen::class, 'idKegiatanUtama');
    }
}