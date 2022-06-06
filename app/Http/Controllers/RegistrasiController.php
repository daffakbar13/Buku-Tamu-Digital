<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keperluan;
use App\Models\Tamu;
use App\Models\Instruksi;
use App\Models\Resepsionis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

class RegistrasiController extends Controller
{
    function tanggal_indonesia($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    public function setCookie(Request $request)
    {
    }

    public function index(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'resepsionis' => 'required',
            ],
            [
                'resepsionis.required' => 'resepsionis',
            ]
        )->validate();

        $keperluan = DB::table('master_keperluan')
            ->get();

        $resepsionis = $request->resepsionis;



        $data = [
            'hariIni' => app('App\Http\Controllers\Controller')->TamuHariIni(),
            'bulanIni' => app('App\Http\Controllers\Controller')->TamuBulanIni(),
            'tahunIni' => app('App\Http\Controllers\Controller')->TamuTahunIni(),
            'keperluan' => $keperluan,
            'resepsionis' => $resepsionis,
            'success' => 'null'

        ];

        return view('registrasi/index', $data);
    }


    public function index2(Request $request)
    {
        Validator::make(
            $request->all(),
            [
                'resepsionis' => 'required',
            ],
            [
                'resepsionis.required' => 'resepsionis',
            ]
        )->validate();

        $resepsionis = $request->resepsionis;


        $data = [
            'hariIni' => app('App\Http\Controllers\Controller')->TamuHariIni(),
            'bulanIni' => app('App\Http\Controllers\Controller')->TamuBulanIni(),
            'tahunIni' => app('App\Http\Controllers\Controller')->TamuTahunIni(),
            'resepsionis' => $resepsionis,
            'success' => 'null'
        ];

        return view('registrasi/index2', $data);
    }

    public function ttdTamu(Request $request)
    {
        // if ($request->keperluan == 'Keperluan lainnya') {
        //     Validator::make(
        //         $request->all(),
        //         [
        //             'nama' => 'required',
        //             'alamat' => 'required',
        //             'keperluan_lainnya' => 'required'
        //         ],
        //         [
        //             'nama.required' => 'nama',
        //             'alamat.required' => 'alamat/instansi',
        //             'keperluan_lainnya.required' => 'keperluan lainnya'
        //         ]
        //     )->validate();
        // } else {
        //     Validator::make(
        //         $request->all(),
        //         [
        //             'nama' => 'required',
        //             'alamat' => 'required',
        //             'keperluan' => 'required'
        //         ],
        //         [
        //             'nama.required' => 'nama',
        //             'alamat.required' => 'alamat/instansi',
        //             'keperluan.required' => 'keperluan'
        //         ]
        //     )->validate();
        // };

        $tamu = $request->nama;
        $no_telp = $request->no_telp;
        $alamat = $request->alamat;
        $keperluan = $request->keperluan;
        $keperluan_lainnya = $request->keperluan_lainnya;
        $resepsionis = $request->resepsionis;

        $data = [
            'tamu' => $tamu,
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'keperluan' => $keperluan,
            'keperluan_lainnya' => $keperluan_lainnya,
            'resepsionis' => $resepsionis,
        ];

        return view('registrasi/ttdTamu', $data);
    }

    public function store(Request $request)
    {
        $keperluan = DB::table('master_keperluan')
            ->get();

        // id tamu
        $lastIdTamu = DB::table('tabel_tamu')
            ->max('id_tamu');
        $lastIdInstruksi = DB::table('tabel_instruksi')
            ->max('id_tamu');
        $a = [$lastIdTamu, $lastIdInstruksi];

        $id_tamu = max($a) + 1;

        // save ttd
        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.' . $image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        // set zona waktu
        date_default_timezone_set('Asia/Jakarta');

        $created_at = date_timestamp_get(now());

        // save tamu
        $tamu = new Tamu;
        $tamu->id_tamu = $id_tamu;
        $tamu->nama_tamu = $request->nama;
        $tamu->alamat = $request->alamat;
        $tamu->no_telp = $request->no_telp;
        $tamu->ttd = $signature;
        $tamu->created_at = $created_at;
        $tamu->save();

        // save keperluan
        $keperluan = new Keperluan;
        $keperluan->id_tamu = $id_tamu;
        if ($request->keperluan_lainnya == null) {
            $keperluan->nama_keperluan = $request->keperluan;
        } else {
            $keperluan->nama_keperluan = $request->keperluan_lainnya;
        }
        $keperluan->tanggal = $created_at;
        $keperluan->save();

        // save resepsionis
        $resepsionis = new Resepsionis;
        $resepsionis->nama_resepsionis = $request->resepsionis;
        $resepsionis->id_tamu = $id_tamu;
        $resepsionis->save();
        //echo '<script type="text/javascript">';
        // echo 'window.alert("sometext");';
        // echo '</script>';

        return redirect()->to('/registrasi1?resepsionis=' . $request->resepsionis)->with('success', 'Data Berhasil Disimpan!');
    }

    public function ttdInstruksi(Request $request)
    {
        // Validator::make(
        //     $request->all(),
        //     [
        //         'nama' => 'required',
        //         'jabatan' => 'required',
        //         'instruksi' => 'required',
        //         'signed' => 'required',
        //     ],
        //     [
        //         'nama.required' => 'nama',
        //         'jabatan.required' => 'jabatan',
        //         'instruksi.required' => 'instruksi',
        //         'signed.required' => 'tanda tangan',
        //     ]
        // )->validate();

        $tamu = $request->nama;
        $jabatan = $request->jabatan;
        $instruksi = $request->instruksi;
        $resepsionis = $request->resepsionis;

        $data = [
            'tamu' => $tamu,
            'jabatan' => $jabatan,
            'instruksi' => $instruksi,
            'resepsionis' => $resepsionis,
        ];

        return view('registrasi/ttdInstruksi', $data);
    }

    public function store2(Request $request)
    {
        // id tamu
        $lastIdTamu = DB::table('tabel_tamu')
            ->max('id_tamu');
        $lastIdInstruksi = DB::table('tabel_instruksi')
            ->max('id_tamu');
        $a = [$lastIdTamu, $lastIdInstruksi];

        $id_tamu = max($a) + 1;

        // created at
        date_default_timezone_set('Asia/Jakarta');
        $created_at = date_timestamp_get(now());

        // save ttd
        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.' . $image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        // save tamu
        $instruksi = new Instruksi;
        $instruksi->id_tamu = $id_tamu;
        $instruksi->nama_tamu = $request->nama;
        $instruksi->jabatan_tamu = $request->jabatan;
        $instruksi->instruksi = $request->instruksi;
        $instruksi->ttd = $signature;
        $instruksi->created_at = $created_at;
        $instruksi->save();

        // save resepsionis
        $resepsionis = new Resepsionis;
        $resepsionis->nama_resepsionis = $request->resepsionis;
        $resepsionis->id_tamu = $id_tamu;
        $resepsionis->save();

        return redirect()->to('/registrasi2?resepsionis=' . $request->resepsionis)->with('success', 'Data Berhasil Disimpan!');
    }
}
