<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Domisili extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $table = 'surat_ket_domisili';
    protected $primaryKey = 'id_surat_ket_domisili';
    public static function suratByUserId($id_warga)
    {
        return self::where('id_warga', $id_warga)->get();
    }
}