<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelompokKeahlian extends Model
{
    use HasFactory;

    protected $table = 'kelompok_keahlian';

    protected $fillable = ['nama_kk', 'sub_kk'];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_has_kk', 'kk_id', 'dosen_id');
    }
}
