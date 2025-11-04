<?php

namespace App\Models\Dupak;
use App\Models\Dosen;

class Pengajuan extends DupakModel
{
    protected $table = 'pengajuan';
        protected $fillable = [
            'idDosen',
            'start',
            'end',
            'TahunAjaranAjuanAwal',
            'TahunAjaranAjuanAkhir',
            'semesterAjuan',
            'jfaAsal',
            'jfaTujuan'
        ];

        public function dosen()
        {
            return $this->belongsTo(Dosen::class, 'idDosen');
        }

        public function rekapitulasiKomponen()
        {
            return $this->hasMany(InputRekapitulasiKomponen::class, 'idPengajuan');
        }

        public function jabatanAsal()
        {
            return $this->belongsTo(RefJabatanFungsionalAkademik::class, 'jfaAsal');
        }

        public function jabatanTujuan()
        {
            return $this->belongsTo(RefJabatanFungsionalAkademik::class, 'jfaTujuan');
        }
}