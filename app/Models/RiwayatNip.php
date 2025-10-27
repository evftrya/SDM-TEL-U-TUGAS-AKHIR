<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RiwayatNip extends Model
{
    use HasFactory;

    protected $table = 'riwayat_nips';

    protected $fillable = [
        'nip',
        'status_pegawai_id',
        'users_id',
        'tanggal_berlaku',
        'is_active',
    ];

    protected $casts = [
        'tanggal_berlaku' => 'date',
        'is_active' => 'boolean',
    ];

    public function pegawai()
    {
        return $this->belongsTo(User::class);
    }

    public function statusPegawai()
    {
        return $this->belongsTo(RefStatusPegawai::class, 'status_pegawai_id');
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
