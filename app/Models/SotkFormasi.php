<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SotkFormasi extends Model
{
    use HasFactory;

    protected $table = 'sotk_formasi';

    protected $fillable = [
        'sotk_level_id',
        'nama_formasi',
        'atasan_formasi_id',
    ];

    // Relationships
    public function level()
    {
        return $this->belongsTo(SotkLevel::class, 'sotk_level_id');
    }

    public function atasan()
    {
        return $this->belongsTo(SotkFormasi::class, 'atasan_formasi_id');
    }

    public function bawahan()
    {
        return $this->hasMany(SotkFormasi::class, 'atasan_formasi_id');
    }

    public function pemetaan()
    {
        return $this->hasMany(SotkPemetaan::class);
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
