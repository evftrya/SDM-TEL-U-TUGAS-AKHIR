<?php

namespace App\Models\Dupak;

class RefNilaiKumBaku extends DupakModel
{
    protected $table = 'ref_nilai_kum_baku';

    protected $fillable = [
        'idKegiatanKomponen',
        'idJenisInput',
        'kondisi',
        'nilai',
        'satuan',
        'isActive'
    ];

    public function kegiatanKomponen()
    {
        return $this->belongsTo(RefKegiatanKomponen::class, 'idKegiatanKomponen');
    }

    public function jenisInput()
    {
        return $this->belongsTo(RefJenisInput::class, 'idJenisInput');
    }
}
