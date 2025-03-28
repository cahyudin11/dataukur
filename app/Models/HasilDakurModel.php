<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDakurModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hasil_dakur';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'biodata_id',
        'quality_id',
        'proyek_id',
        'panjang_baju',
        'lingkar_leher',
        'lebar_bahu',
        'panjang_lenganpen',
        'panjang_lenganpan',
        'lingkar_ketiak',
        'sikut',
        'ujung_lengan',
        'lebar_dada',
        'lingkar_badan',
        'lingkar_perut',
        'lingkar_pinggang',
        'lingkar_pinggul',
        'lingkar_pinggangcel',
        'lingkar_pinggulcel',
        'panjang_celana',
        'lingkar_lutut',
        'lingkar_kaki',
        'tinggi_kruis',
        'lebar_paha',
        'keterangan'
    ];


    public function biodata()
    {
        return $this->belongsTo(BiodataModel::class, 'biodata_id', 'id');
    }

    public function quality()
    {
        return $this->belongsTo(QualityControlModel::class, 'quality_id', 'id_kua');
    }
    public function proyek()
    {
        return $this->belongsTo(ProyekModel::class, 'proyek_id', 'id');
    }
}
