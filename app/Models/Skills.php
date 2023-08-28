<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{    use HasFactory;
    protected $table = 'tb_skills';

    // Definisikan atribut yang dapat diisi (fillable) oleh pengguna
    protected $fillable = ['id', 'nama_skill','catatan','status'];
}
