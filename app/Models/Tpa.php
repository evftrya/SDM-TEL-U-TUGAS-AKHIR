<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tpa extends Model
{
    use HasFactory;

    protected $table = 'tpas';

    protected $fillable = [
        'users_id',
        'nitk',
    ];

    protected $casts = [
        'id' => 'string',
    ];
    // Relationships
    public function pegawai()
    {
        return $this->belongsTo(User::class);
    }

    // public function riwayatJabatanFungsional()
    // {
    //     return $this->hasMany(RiwayatJabatanFungsionalTpa::class);
    // }

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

