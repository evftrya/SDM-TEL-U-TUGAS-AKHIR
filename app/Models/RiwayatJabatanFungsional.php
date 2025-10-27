<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RiwayatJabatanFungsional extends Model
{
    use HasFactory;

    protected $table = 'riwayat_jabatan_fungsional';

    protected $fillable = [
        'dosen_id',
        'jafung_id',
        'tmt_jafung',
        'no_sk',
    ];

    protected $casts = ['tmt_jafung' => 'date'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function jabatanFungsional()
    {
        return $this->belongsTo(RefJabatanFungsional::class, 'jafung_id');
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
