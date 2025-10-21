<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'pegawai_id',
        'prodi_id',
        'nidn',
    ];

    // Relationships
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function kelompokKeahlian()
    {
        return $this->belongsToMany(KelompokKeahlian::class, 'dosen_has_kk', 'dosen_id', 'kk_id');
    }

    public function coe()
    {
        return $this->belongsToMany(Coe::class, 'dosen_has_coe', 'dosen_id', 'coe_id');
    }

    public function riwayatJabatanFungsional()
    {
        return $this->hasMany(RiwayatJabatanFungsional::class);
    }

    public function riwayatPangkat()
    {
        return $this->hasMany(RiwayatPangkat::class);
    }

    public function sertifikasi()
    {
        return $this->hasOne(SertifikasiDosen::class);
    }
}
