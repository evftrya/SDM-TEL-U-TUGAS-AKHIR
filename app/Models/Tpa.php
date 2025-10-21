<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tpa extends Model
{
    use HasFactory;

    protected $table = 'tpa';

    protected $fillable = [
        'pegawai_id',
        'nitk',
    ];

    // Relationships
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function riwayatJabatanFungsional()
    {
        return $this->hasMany(RiwayatJabatanFungsionalTpa::class);
    }
}
