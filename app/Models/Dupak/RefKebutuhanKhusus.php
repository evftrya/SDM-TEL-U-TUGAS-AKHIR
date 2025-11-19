<?php

namespace App\Models\Dupak;

class RefKebutuhanKhusus extends DupakModel
{
    protected $table = 'ref_kebutuhan_khusus';

    protected $fillable = [
        'nama',
        'deskripsi',
        'isActive'
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'kebutuhanKhususId');
    }
}