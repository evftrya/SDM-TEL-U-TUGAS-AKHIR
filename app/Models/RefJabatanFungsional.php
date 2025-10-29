<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RefJabatanFungsional extends Model
{
    use HasFactory;

    protected $table = 'ref_jabatan_fungsional';

    protected $fillable = ['nama_jafung'];

    protected $casts = [
        'id' => 'string',
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
