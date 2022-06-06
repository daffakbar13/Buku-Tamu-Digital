<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tahun = $request->date;
        if ($tahun == null) {
            $tahun = 2021;
        }
        if ($request->grafik == "bukuTamu") {
            $tabel = "tabel_tamu";
            $judul = "Buku Tamu";
        } else {
            $tabel = "tabel_instruksi";
            $judul = "Buku Instruksi";
        }
        $januari = date_timestamp_get(new DateTime('midnight first day of january ' . $tahun));
        $februari = date_timestamp_get(new DateTime('midnight first day of february ' . $tahun));
        $maret = date_timestamp_get(new DateTime('midnight first day of march ' . $tahun));
        $april = date_timestamp_get(new DateTime('midnight first day of april ' . $tahun));
        $mei = date_timestamp_get(new DateTime('midnight first day of may ' . $tahun));
        $juni = date_timestamp_get(new DateTime('midnight first day of june ' . $tahun));
        $juli = date_timestamp_get(new DateTime('midnight first day of july ' . $tahun));
        $agustus = date_timestamp_get(new DateTime('midnight first day of august ' . $tahun));
        $september = date_timestamp_get(new DateTime('midnight first day of september ' . $tahun));
        $oktober = date_timestamp_get(new DateTime('midnight first day of october ' . $tahun));
        $november = date_timestamp_get(new DateTime('midnight first day of november ' . $tahun));
        $desember = date_timestamp_get(new DateTime('midnight first day of december ' . $tahun));
        $januarii = date_timestamp_get((clone new DateTime('midnight first day of january ' . $tahun))->modify("+1 years"));

        $tamu1 = DB::table($tabel)
            ->whereBetween('created_at', [$januari, $februari])
            ->count();
        $tamu2 = DB::table($tabel)
            ->whereBetween('created_at', [$februari, $maret])
            ->count();
        $tamu3 = DB::table($tabel)
            ->whereBetween('created_at', [$maret, $april])
            ->count();
        $tamu4 = DB::table($tabel)
            ->whereBetween('created_at', [$april, $mei])
            ->count();
        $tamu5 = DB::table($tabel)
            ->whereBetween('created_at', [$mei, $juni])
            ->count();
        $tamu6 = DB::table($tabel)
            ->whereBetween('created_at', [$juni, $juli])
            ->count();
        $tamu7 = DB::table($tabel)
            ->whereBetween('created_at', [$juli, $agustus])
            ->count();
        $tamu8 = DB::table($tabel)
            ->whereBetween('created_at', [$agustus, $september])
            ->count();
        $tamu9 = DB::table($tabel)
            ->whereBetween('created_at', [$september, $oktober])
            ->count();
        $tamu10 = DB::table($tabel)
            ->whereBetween('created_at', [$oktober, $november])
            ->count();
        $tamu11 = DB::table($tabel)
            ->whereBetween('created_at', [$november, $desember])
            ->count();
        $tamu12 = DB::table($tabel)
            ->whereBetween('created_at', [$desember, $januarii])
            ->count();
        $alltamu = DB::table($tabel)
            ->whereBetween('created_at', [$januari, $januarii])
            ->count();
        $master_keperluan = DB::table('master_keperluan')
            ->get('nama_keperluan');
        for ($i = 0; $i < count($master_keperluan); $i++) {
            $keperluan[$i] = DB::table('tabel_keperluan')
                ->where('nama_keperluan', $master_keperluan[$i]->nama_keperluan)
                ->whereBetween('tanggal', [$januari, $januarii])
                ->count();
        };
        $keperluanLainnya = DB::table('tabel_keperluan')
            ->where('nama_keperluan', 'Keperluan Lainnya')
            ->whereBetween('tanggal', [$januari, $januarii])
            ->count();
        $jumlahKeperluan = DB::table('tabel_keperluan')
            ->whereBetween('tanggal', [$januari, $januarii])
            ->count();

        $data = [
            'januari' => $tamu1,
            'februari' => $tamu2,
            'maret' => $tamu3,
            'april' => $tamu4,
            'mei' => $tamu5,
            'juni' => $tamu6,
            'juli' => $tamu7,
            'agustus' => $tamu8,
            'september' => $tamu9,
            'oktober' => $tamu10,
            'november' => $tamu11,
            'desember' => $tamu12,
            'semua' => $alltamu,
            'tahun' => $tahun,
            'keperluan' => $keperluan,
            'master_keperluan' => $master_keperluan,
            'keperluanLainnya' => $keperluanLainnya,
            'jumlahKeperluan' => $jumlahKeperluan,
            'grafik' => $request->grafik,
            'judul' => $judul
        ];

        return view('chart.index', $data);
    }
}
