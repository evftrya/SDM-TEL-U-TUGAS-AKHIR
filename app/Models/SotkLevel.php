<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SotkLevel extends Model
{
    use HasFactory;

    protected $table = 'sotk_level';

    protected $fillable = ['nama_level'];

    public function formasi()
    {
        return $this->hasMany(SotkFormasi::class);
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
