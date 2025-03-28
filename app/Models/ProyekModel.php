<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyekModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'proyek';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nama_proyek',
    ];
    public function hasildakur()
    {
        return $this->hasMany(HasilDakurModel::class, 'proyek_id', 'id');
    }
}
