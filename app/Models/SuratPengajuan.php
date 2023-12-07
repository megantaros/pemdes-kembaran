<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['tanggal'];
    protected $table = 'permohonan_surat';
    protected $primaryKey = 'id_permohonan_surat';
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = \Illuminate\Support\Str::uuid();
        });
    }
}