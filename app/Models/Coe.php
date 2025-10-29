<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coe extends Model
{
    use HasFactory;

    protected $table = 'coe';

    protected $fillable = ['nama_coe'];
    protected $casts = [
        'id' => 'string',
    ];

    public function dosen()
    {
        return $this->belongsToMany(Dosen::class, 'dosen_has_coe', 'coe_id', 'dosen_id');
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
