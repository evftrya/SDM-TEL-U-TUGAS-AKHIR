<?php

namespace App\Models\Dupak;

class RiwayatStatusPengajuan extends DupakModel
{
    protected $table = 'riwayat_status_pengajuan';

    protected $fillable = [
        'pengajuanId',
        'statusPengajuanId',
        'tanggal',
        'keterangan',
        'userId'
    ];

    protected $casts = [
        'tanggal' => 'datetime'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuanId');
    }

    public function status()
    {
        return $this->belongsTo(RefStatusPengajuan::class, 'statusPengajuanId');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'userId');
    }
}