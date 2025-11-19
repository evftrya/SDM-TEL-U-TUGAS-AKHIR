<?php

namespace App\Models\Dupak;

class RefRegulasiKumKomponen extends DupakModel
{
    protected $table = 'ref_regulasi_kum_komponen';

    protected $fillable = [
        'idKegiatanUtama',
        'keterangan',
        'nilaiKum',
        'isActive'
    ];

    public function kegiatanUtama()
    {
        return $this->belongsTo(RefKegiatanUtama::class, 'idKegiatanUtama');
    }
}
