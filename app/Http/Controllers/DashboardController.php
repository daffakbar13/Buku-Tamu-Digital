<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariIni = date_timestamp_get(new DateTime('midnight now'));
        $besok = date_timestamp_get(new DateTime('midnight tomorrow'));
        $awalBulan = date_timestamp_get(new DateTime('midnight first day of this month'));
        $akhirBulan = date_timestamp_get(new DateTime('midnight first day of next month'));
        $awalTahun = date_timestamp_get(new DateTime('midnight first day of january this year'));
        $akhirTahun = date_timestamp_get(new DateTime('midnight first day of january next year'));

        $tamuHariIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$hariIni, $besok])
            ->count();
        $tamuBulanIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$awalBulan, $akhirBulan])
            ->count();
        $tamuTahunIni = DB::table('tabel_tamu')
            ->whereBetween('created_at', [$awalTahun, $akhirTahun])
            ->count();
        $resepsionis = DB::table('master_resepsionis')
            ->get('*');

        $data = [
            'hariIni' => $tamuHariIni,
            'bulanIni' => $tamuBulanIni,
            'tahunIni' => $tamuTahunIni,
            'resepsionis' => $resepsionis
        ];

        return view('dashboard/index', $data);
    }
}
