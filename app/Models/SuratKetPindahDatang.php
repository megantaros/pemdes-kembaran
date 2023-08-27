<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKetPindahDatang extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];
    protected $table = 'surat_ket_pindah_datang';
    protected $primaryKey = 'id_surat_ket_pindah_datang';
}