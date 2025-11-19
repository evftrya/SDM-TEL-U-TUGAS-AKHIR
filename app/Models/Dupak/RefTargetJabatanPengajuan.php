<?php

namespace App\Models\Dupak;

class RefTargetJabatanPengajuan extends DupakModel
{
    protected $table = 'ref_target_jabatan_pengajuan';

    protected $fillable = [
        'jfaAsal',
        'jfaTujuan',
        'waktuTunggu',
        'minimalKum',
        'isActive'
    ];

    public function jabatanAsal()
    {
        return $this->belongsTo(RefJabatanFungsionalAkademik::class, 'jfaAsal');
    }

    public function jabatanTujuan()
    {
        return $this->belongsTo(RefJabatanFungsionalAkademik::class, 'jfaTujuan');
    }
}