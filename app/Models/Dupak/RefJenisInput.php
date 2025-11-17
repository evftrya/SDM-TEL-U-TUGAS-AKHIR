<?php

namespace App\Models\Dupak;

class RefJenisInput extends DupakModel
{
    protected $table = 'ref_jenis_input';

    protected $fillable = [
        'nama',
        'idKomponen',
        'isActive'
    ];

    public function komponen()
    {
        return $this->belongsTo(RefKegiatanKomponen::class, 'idKomponen');
    }

    public function nilaiKumBaku()
    {
        return $this->hasMany(RefNilaiKumBaku::class, 'idJenisInput');
    }
}
