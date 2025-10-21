<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefStatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'ref_status_pegawai';

    protected $fillable = ['status_pegawai'];

    public function riwayatNip()
    {
        return $this->hasMany(RiwayatNip::class, 'status_pegawai_id');
    }
}
