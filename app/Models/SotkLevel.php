<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SotkLevel extends Model
{
    use HasFactory;

    protected $table = 'sotk_level';

    protected $fillable = ['nama_level'];

    public function formasi()
    {
        return $this->hasMany(SotkFormasi::class);
    }
}
