<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coe extends Model
{
    use HasFactory;

    protected $table = 'coe';

    protected $fillable = ['nama_coe'];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_has_coe', 'coe_id', 'dosen_id');
    }
}
