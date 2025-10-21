<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';
    public $timestamps = false;

    protected $fillable = ['nama_fakultas'];

    // Relationships
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }
}
