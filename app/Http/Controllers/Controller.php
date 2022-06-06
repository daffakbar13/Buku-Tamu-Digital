<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DateTime;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function TamuHariIni()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariIni = date_timestamp_get(new DateTime('midnight now'));
        $besok = date_timestamp_get(new DateTime('midnight tomorrow'));

        $tamuHariIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$hariIni, $besok])
            ->count();
        $instruksiHariIni = DB::table('tabel_instruksi')
            ->whereBetween('created_at', [$hariIni, $besok])
            ->count();

        $hasil = $tamuHariIni + $instruksiHariIni;

        return $hasil;
    }
    public function TamuBulanIni()
    {
        date_default_timezone_set('Asia/Jakarta');
        $awalBulan = date_timestamp_get(new DateTime('midnight first day of this month'));
        $akhirBulan = date_timestamp_get(new DateTime('midnight first day of next month'));

        $tamuBulanIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$awalBulan, $akhirBulan])
            ->count();
        $instruksiBulanIni = DB::table('tabel_instruksi')
            ->whereBetween('created_at', [$awalBulan, $akhirBulan])
            ->count();

        $hasil = $tamuBulanIni + $instruksiBulanIni;

        return $hasil;
    }
    public function TamuTahunIni()
    {
        date_default_timezone_set('Asia/Jakarta');
        $awalTahun = date_timestamp_get(new DateTime('midnight first day of january this year'));
        $akhirTahun = date_timestamp_get(new DateTime('midnight first day of january next year'));

        $tamuTahunIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$awalTahun, $akhirTahun])
            ->count();
        $instruksiTahunIni = DB::table('tabel_instruksi')
            ->whereBetween('created_at', [$awalTahun, $akhirTahun])
            ->count();

        $hasil = $tamuTahunIni + $instruksiTahunIni;

        return $hasil;
    }
}
