<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class pengawakan extends Model
{
    /** @use HasFactory<\Database\Factories\PengawakanFactory> */
    use HasFactory;

    protected $table = 'pengawakans';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = [
        'users_id',
        'formasi_id',
        'tmt_mulai',
        'tmt_selesai',
    ];

    protected $casts = [
        'id' => 'string',
        'users_id' => 'string',
        'formasi_id' => 'string',
        'tmt_mulai' => 'date',
        'tmt_selesai' => 'date',
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
