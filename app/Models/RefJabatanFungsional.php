<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJabatanFungsional extends Model
{
    use HasFactory;

    protected $table = 'ref_jabatan_fungsional';

    protected $fillable = ['nama_jafung'];
}
