<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;

    protected $table = 'tb_apply';

    protected $fillable = [
        'id', 'id_loker', 'id_user', 'id_cabang', 'resume',
        'cv', 'birth', 'id_provinsi', 'id_kota', 'id_kecamatan',
        'cover', 'created_at', 'updated_at', 'deleted_at', 'status'
    ];
}
