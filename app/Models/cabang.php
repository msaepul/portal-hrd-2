<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    use HasFactory;
    protected $table = 'tb_cabang';

    // Definisikan atribut yang dapat diisi (fillable) oleh pengguna
    protected $fillable = ['id', 'nama_cabang','pt','keterangan','alamat','status','created_at', 'deleted_at'];
}
