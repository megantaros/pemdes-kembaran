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