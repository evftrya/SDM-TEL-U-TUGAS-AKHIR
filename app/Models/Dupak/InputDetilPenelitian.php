<?php

namespace App\Models\Dupak;

class InputDetilPenelitian extends DupakModel
{
    protected $table = 'input_detil_penelitian';
    protected $fillable = [
        'nama',
        'tanggalPublikasi',
        'idDetiInputan',
        'penulis',
        'judul',
        'jenisPublikasi',
        'namaJurnal',
        'penerbitpenyelenggara',
        'akre',
        'vol',
        'no',
        'tahun',
        'halaman',
        'issn',
        'Link1',
        'Link2',
        'Link3',
        'similarityInclude',
        'similarityExclude',
        'similarityAI',
        'rincian',
        'LinksimilarityInclude',
        'LinksimilarityExclude',
        'LinksimilarityAI',
        'LinkKorespondensi',
        'statusSyaratUtama'
    ];

    public function detilUmum()
    {
        return $this->belongsTo(InputDetilUmum::class, 'idDetiInputan');
    }
}