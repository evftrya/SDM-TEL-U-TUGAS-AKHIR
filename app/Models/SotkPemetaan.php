<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SotkPemetaan extends Model
{
    use HasFactory;

    protected $table = 'sotk_pemetaan';

    protected $fillable = [
        'users_id',
        'sotk_formasi_id',
        'tmt_mulai',
        'tmt_selesai',
    ];

    protected $casts = [
        'tmt_mulai' => 'date',
        'tmt_selesai' => 'date',
    ];

    // Relationships
    public function pegawai()
    {
        return $this->belongsTo(User::class);
    }

    public function formasi()
    {
        return $this->belongsTo(SotkFormasi::class, 'sotk_formasi_id');
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
