<?php

namespace App\Models\Dupak;

class InputRekapitulasiKomponen extends DupakModel
{
    protected $table = 'input_rekapitulasi_komponen';
    protected $fillable = [
        'idPengajuan',
        'uraianKegiatan',
        'volume',
        'NilaiTotal',
        'NilaiDiakui',
        'idKegiatanKomponen',
        'tahunAjaran',
        'semester'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'idPengajuan');
    }

    public function kegiatanKomponen()
    {
        return $this->belongsTo(RefKegiatanKomponen::class, 'idKegiatanKomponen');
    }

    public function detailUmum()
    {
        return $this->hasMany(InputDetilUmum::class, 'idInputDetilUmum');
    }
}