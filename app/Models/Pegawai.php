<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pegawai';
    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'username',
        'password_hash',
        'email',
        'email_verified_at',
        'remember_token',
        'is_admin',
    ];

    protected $hidden = ['password_hash', 'remember_token'];

    /**
     * Get the password for the user.
     */
    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'is_admin' => 'boolean',
        ];
    }

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
