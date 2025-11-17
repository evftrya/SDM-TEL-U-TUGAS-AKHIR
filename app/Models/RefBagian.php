<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class RefBagian extends Model
{
    /** @use HasFactory<\Database\Factories\BagianFactory> */
    use HasFactory;
    protected $table = 'ref_bagians';

    protected $fillable = ['nama_bagian'];
    protected $casts = [
        'id' => 'string',
        'nama_bagian' => 'string',
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
