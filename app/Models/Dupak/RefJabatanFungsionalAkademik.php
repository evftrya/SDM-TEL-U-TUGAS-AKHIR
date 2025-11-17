<?php

namespace App\Models\Dupak;

use App\Models\Dosen;

class RefJabatanFungsionalAkademik extends DupakModel
{
    protected $table = 'ref_jabatan_fungsional_akademik';
    protected $fillable = [
        'nama',
        'namaPanjang',
        'kum'
    ];

    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'jfa_saat_ini');
    }

    public function pengajuanAsal()
    {
        return $this->hasMany(Pengajuan::class, 'jfaAsal');
    }

    public function pengajuanTujuan()
    {
        return $this->hasMany(Pengajuan::class, 'jfaTujuan');
    }

    public function targetJabatanAsal()
    {
        return $this->hasMany(RefTargetJabatanPengajuan::class, 'jfaAsal');
    }

    public function targetJabatanTujuan()
    {
        return $this->hasMany(RefTargetJabatanPengajuan::class, 'jfaTujuan');
    }
}