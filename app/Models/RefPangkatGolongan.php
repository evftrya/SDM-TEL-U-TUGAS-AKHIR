<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPangkatGolongan extends Model
{
    use HasFactory;

    protected $table = 'ref_pangkat_golongan';

    protected $fillable = ['pangkat', 'golongan'];
}
