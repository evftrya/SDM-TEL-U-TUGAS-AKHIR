<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SertifikasiDosen extends Model
{
    use HasFactory;

    protected $table = 'sertifikasi_dosens';

    protected $fillable = [
        'dosen_id',
        'nomor_registrasi',
        'no_sk',
        'tanggal_sk',
    ];

    protected $casts = [
        'id' => 'string',
        'dosen_id' => 'string',
        'tanggal_sk' => 'date',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
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
