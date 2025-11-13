<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class formation extends Model
{
    /** @use HasFactory<\Database\Factories\FormationFactory> */
    use HasFactory;

    protected $table = 'formations';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $fillable = [
        'nama_formation',
        'level_id',
        'atasan_formations_id',
        'tmt_mulai',
        'bagian',
        'prodi',
        'fakultas',
        'kuota'
    ];



    protected $casts = [
        'id' => 'string',
        'level_id' => 'string',
        'atasan_formations_id' => 'string',
        'tmt_mulai' => 'date',
        'bagian' => 'string',
        'kuota' => 'integer',
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
