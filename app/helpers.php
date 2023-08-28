<?php

use App\Models\cabang;
use App\Models\Departemen;
use App\Models\Skills;

use Illuminate\Support\Facades\Auth;

if (!function_exists(function: 'getNameDept')) {
    function getNameDept($idcabang)
    {

        $arraycabang = Departemen::where('id', '=', "$idcabang")
            ->get()
            ->first();
        $cabang = $arraycabang->departemen;

        return "$cabang";
    }
}
if (!function_exists(function: 'getNameCabang')) {
    function getNameCabang($idcabang)
    {

        $arraycabang = cabang::where('id', '=', "$idcabang")
            ->get()
            ->first();
        $cabang = $arraycabang->keterangan;

        return "$cabang";
    }
}
if (!function_exists(function: 'getSingkatanCabang')) {
    function getSingkatanCabang($idcabang)
    {

        $arraycabang = cabang::where('id', '=', "$idcabang")
            ->get()
            ->first();
        $cabang = $arraycabang->nama_cabang;

        return "$cabang";
    }
}
if (!function_exists(function: 'getPTCabang')) {
    function getPTCabang($idcabang)
    {

        $arraycabang = cabang::where('id', '=', "$idcabang")
            ->get()
            ->first();
        $cabang = $arraycabang->pt;

        return "$cabang";
    }
}
if (!function_exists(function: 'getAlamatCabang')) {
    function getAlamatCabang($idcabang)
    {

        $arraycabang = cabang::where('id', '=', "$idcabang")
            ->get()
            ->first();
        $cabang = $arraycabang->alamat;

        return "$cabang";
    }
}
if (!function_exists('getUserId')) {
    function getUserId()
    {
        $id = Auth::user()->id;
        return $id;
    }
}
if (!function_exists('getUserIDCabang')) {
    function getUserIDCabang()
    {
        $id = Auth::user()->id_cabang;
        return $id;
    }
}


if (!function_exists('custom_str_limit')) {
    function custom_str_limit($value, $limit = 100, $end = ' <strong style="color: #5e72e4;">Selengkapnya..</strong>')
    {
        return Illuminate\Support\Str::limit($value, $limit, $end);
    }
}

if (!function_exists('getNameSkill')) {
    function getNameSkill($id)
    {
        $arrayskill = Skills::where('id', '=', $id)->first();

        if ($arrayskill) {
            return $arrayskill->nama_skill;
        } else {
            return null; // Nilai default jika skill tidak ditemukan
        }
    }
}

