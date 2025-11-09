<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SK extends Model
{
    /** @use HasFactory<\Database\Factories\SKFactory> */
    use HasFactory;
    protected $table = 'sks';
    protected $fillable = [
        'users_id',
        'no_sk',
        'tanggal_berlaku',
        'file_sk',
        'tipe_sk',
    ];
    
    public $incrementing = false;

    protected $keyType = 'string';

    protected $casts = [
        'id' => 'string',
    ];

    protected static function newFactory()
    {
        return \Database\Factories\SKFactory::new();
    }

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
