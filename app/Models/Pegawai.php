<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'username',
        'password_hash',
    ];

    protected $hidden = ['password_hash'];

    // Relationships
    public function dosen()
    {
        return $this->hasOne(Dosen::class);
    }

    public function tpa()
    {
        return $this->hasOne(Tpa::class);
    }

    public function riwayatNip()
    {
        return $this->hasMany(RiwayatNip::class);
    }

    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikan::class);
    }

    public function sotkPemetaan()
    {
        return $this->hasMany(SotkPemetaan::class);
    }

    public function studiLanjut()
    {
        return $this->hasMany(StudiLanjut::class);
    }
}
