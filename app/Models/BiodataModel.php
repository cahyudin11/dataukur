<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'biodata';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tipe_pakaian', 'signature', 'satker', 'quality_id', 'nama', 'jabatan', 'pangkat', 'nrp', 'berat_badan', 'tinggi_badan', 'tanggal', 'photo'];

    public function hasildakur()
    {
        return $this->hasMany(HasilDakurModel::class, 'biodata_id', 'id');
    }

    public function quality()
    {
        return $this->hasManyThrough(QualityControlModel::class, HasilDakurModel::class, 'biodata_id', 'id_kua', 'id', 'quality_id');
    }
}
