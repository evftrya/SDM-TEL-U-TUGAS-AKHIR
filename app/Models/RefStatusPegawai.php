<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RefStatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'ref_status_pegawais';

    protected $fillable = ['status_pegawai'];

    public function riwayatNip()
    {
        return $this->hasMany(RiwayatNip::class, 'status_pegawai_id');
    }

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
