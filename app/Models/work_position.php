<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work_position extends Model
{
    /** @use HasFactory<\Database\Factories\WorkPositionFactory> */
    use HasFactory;
    public $timestamps = true;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'work_positions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'singkatan',
        'position_name',
        'type_work_position',
    ];  
    public function refWorkPosition()
    {
        return $this->belongsTo(ref_work_position::class, 'type_work_position', 'position_name');
    }

    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'fakultas_id', 'id');
    }
    
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) \Illuminate\Support\Str::uuid();
            }
        });
    }
}
