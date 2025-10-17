<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatNip extends Model
{
    use HasFactory;

    protected $table = 'riwayat_nip';

    protected $fillable = [
        'pegawai_id',
        'status_pegawai_id',
        'nip',
        'tanggal_berlaku',
        'is_active',
    ];

    protected $casts = [
        'tanggal_berlaku' => 'date',
        'is_active' => 'boolean',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function statusPegawai()
    {
        return $this->belongsTo(RefStatusPegawai::class, 'status_pegawai_id');
    }
}
