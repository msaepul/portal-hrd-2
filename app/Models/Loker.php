<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
class Loker extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'tb_loker';
    protected $fillable = [
        'id_loker',
        'id_dept',
        'id_cabang',
        'desc_job',
        'require_job',
        'start_date',
        'end_date',
        'resume',
        'gender',
        'date_birth',
        'country',
        'profile_image',
        'cv',
        'tac',
        'status',
        'id_skill',
    ];
    public static function generateNomor()
    {

        $currentMonth = date('m');
        $currentYear = date('Y');
        $cabang = getSingkatanCabang(Auth::user()->id_cabang);

        // Ambil nomor terakhir dari bulan ini
        $lastDocument = Loker::where('id_loker', 'like', $cabang.'/'. $currentYear  . $currentMonth .'/%')
            ->orderBy('id_loker', 'desc')
            ->first();

        $newNumber = '01'; // Nomor default jika belum ada dokumen pada bulan ini

        if ($lastDocument) {
            // Ambil nomor terakhir dan increment nomor
            $lastNumber = substr($lastDocument->id_loker, -2);
            $newNumber = str_pad((int) $lastNumber + 1, 2, '0', STR_PAD_LEFT);
        }

        return $cabang.'/'. $currentYear  .$currentMonth .'/' . $newNumber;
    }
}
