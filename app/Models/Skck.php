<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $table = 'surat_peng_skck';
    protected $primaryKey = 'id_surat_peng_skck';
    // public function model2()
    // {
    //     return $this->hasMany(Domisili::class);
    // }
}