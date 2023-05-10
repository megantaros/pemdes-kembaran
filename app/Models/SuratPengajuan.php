<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $table = 'surat_pengajuan';
    protected $primaryKey = 'id';
}