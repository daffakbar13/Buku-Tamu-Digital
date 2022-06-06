<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Models\Instruksi;
use App\Models\Keperluan;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
// use Barryvdh\DomPDF\PDF;
use DateTime;

class TableController extends Controller
{
    public function index(Request $request)
    {
        $tabel = $request->tabel;
        return view('table/index', [
            'tamu' => DB::table('tabel_tamu')
                ->join('tabel_keperluan', 'tabel_keperluan.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->join('tabel_resepsionis', 'tabel_resepsionis.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->select('tabel_tamu.*', 'tabel_keperluan.*', 'tabel_resepsionis.*')
                ->get(),
            'instruksi' => DB::table('tabel_instruksi')
                ->join('tabel_resepsionis', 'tabel_instruksi.id_tamu', '=', 'tabel_resepsionis.id_tamu')
                ->select('tabel_instruksi.*', 'tabel_resepsionis.*')
                ->get(),
            'tabel' => $tabel
        ]);
    }

    public function show(Request $request)
    {
        global $tanggalAwal;
        global $tanggalAkhir;
        $date2 = strtotime($request->date2) + (60 * 60 * 17);
        $tanggalAwal = strtotime($request->date1) - (60 * 60 * 7);
        $tanggalAkhir = $date2;
        $tabel = $request->tabel;

        return view('table/index2', [
            'tamu' => DB::table('tabel_tamu')
                ->join('tabel_keperluan', 'tabel_keperluan.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->join('tabel_resepsionis', 'tabel_resepsionis.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->select('tabel_tamu.*', 'tabel_keperluan.*', 'tabel_resepsionis.*')
                ->where(function ($query) {
                    global $tanggalAwal, $tanggalAkhir;
                    $query->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                })
                ->get(),
            'instruksi' => DB::table('tabel_instruksi')
                ->join('tabel_resepsionis', 'tabel_instruksi.id_tamu', '=', 'tabel_resepsionis.id_tamu')
                ->select('tabel_instruksi.*', 'tabel_resepsionis.*')
                ->where(function ($query) {
                    global $tanggalAwal, $tanggalAkhir;
                    $query->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
                })
                ->get(),
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir - 1,
            'tabel' => $tabel
        ]);
    }

    public function cetak_pdf(Request $request)
    {
        $data = [
            'tabel' => 'bukuTamu',
            'tamu' => DB::table('tabel_tamu')
                ->join('tabel_keperluan', 'tabel_keperluan.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->join('tabel_resepsionis', 'tabel_resepsionis.id_tamu', '=', 'tabel_tamu.id_tamu')
                ->select('tabel_tamu.*', 'tabel_keperluan.*', 'tabel_resepsionis.*')
                ->get(),
            'instruksi' => DB::table('tabel_instruksi')
                ->join('tabel_resepsionis', 'tabel_instruksi.id_tamu', '=', 'tabel_resepsionis.id_tamu')
                ->select('tabel_instruksi.*', 'tabel_resepsionis.*')
                ->get(),
        ];

        // view()->share('pdf/cetak_tabel_tamu', $data);

        // $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadview('pdf/cetak_tabel_tamu', compact('data'));
        $pdf = PDF::loadview('pdf/cetak_tabel_tamu', compact('data'));

        // // dd($pdf);

        return $pdf->stream('laporan-tamu.pdf');

        // return view('pdf.cetak_tabel_tamu', $data);
    }
}
