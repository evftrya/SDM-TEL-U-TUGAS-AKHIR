<?php

namespace App\Models\Dupak;

class RefKegiatanKomponen extends DupakModel
{
    protected $table = 'ref_kegiatan_komponen';
    protected $fillable = [
        'nama',
        'idKegiatanUtama',
        'status',
        'satuanHasil'
    ];

    public function kegiatanUtama()
    {
        return $this->belongsTo(RefKegiatanUtama::class, 'idKegiatanUtama');
    }

    public function jenisInput()
    {
        return $this->hasMany(RefJenisInput::class, 'idKomponen');
    }

    public function nilaiKumBaku()
    {
        return $this->hasMany(RefNilaiKumBaku::class, 'idKegiatanKomponen');
    }
}