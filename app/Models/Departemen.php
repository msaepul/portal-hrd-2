<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;
    protected $table = 'tb_dept';

    // Definisikan atribut yang dapat diisi (fillable) oleh pengguna
    protected $fillable = ['id', 'departemen','catatan','status', 'created_at', 'deleted_at'];
}
