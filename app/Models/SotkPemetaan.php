<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SotkPemetaan extends Model
{
    use HasFactory;

    protected $table = 'sotk_pemetaan';

    protected $fillable = [
        'pegawai_id',
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
        return $this->belongsTo(Pegawai::class);
    }

    public function formasi()
    {
        return $this->belongsTo(SotkFormasi::class, 'sotk_formasi_id');
    }
}
