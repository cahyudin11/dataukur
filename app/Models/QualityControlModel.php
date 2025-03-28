<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualityControlModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'qualitycontrol';
    protected $primaryKey = 'id_kua';
    protected $fillable = ['id_kua', 'nama_kua'];

    public function hasildakur()
    {
        return $this->hasMany(HasilDakurModel::class, 'quality_id', 'id_kua');
    }
    public function proyek()
    {
        return $this->hasOneThrough(
            ProyekModel::class,   
            HasilDakurModel::class,
            'id',                 
            'id',                 
            'id',      
            'proyek_id'           
        );
    }
}
