<?php

namespace App\Models\Dupak;

class InputDetilUmum extends DupakModel
{
    protected $table = 'input_detil_umum';
    protected $fillable = [
        'uraianKegiatanValue',
        'idInputDetilUmum',
        'idJenisInput',
        'idNilaiKumBaku',
        'valueJenisInput',
        'nilaiKriteria',
        'angkaKredit',
        'lampiran',
        'pengecualian'
    ];

    public function rekapitulasiKomponen()
    {
        return $this->belongsTo(InputRekapitulasiKomponen::class, 'idInputDetilUmum');
    }

    public function jenisInput()
    {
        return $this->belongsTo(RefJenisInput::class, 'idJenisInput');
    }

    public function nilaiKumBaku()
    {
        return $this->belongsTo(RefNilaiKumBaku::class, 'idNilaiKumBaku');
    }

    public function detilPenelitian()
    {
        return $this->hasOne(InputDetilPenelitian::class, 'idDetiInputan');
    }
}