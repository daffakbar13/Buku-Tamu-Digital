<?php

namespace App\Http\Controllers;

use App\Models\MasterKeperluan;
use App\Models\MasterResepsionis;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('admin/index', [
            'resepsionis' => DB::table('master_resepsionis')
                ->get(),
            'keperluan' => DB::table('master_keperluan')
                ->get()
        ]);
    }

    public function hapusResepsionis(Request $request)
    {
        if ($request->gambar_resepsionis != 'default.jpg') {
            unlink('asset/' . $request->gambar_resepsionis);
        }

        DB::table('master_resepsionis')
            ->where('id_resepsionis', $request->id_resepsionis)
            ->delete();

        return redirect()->back();
    }

    public function hapusKeperluan(Request $request)
    {
        DB::table('master_keperluan')
            ->where('id_keperluan', $request->id_keperluan)
            ->delete();

        return redirect()->back();
    }

    public function formEdit(Request $request)
    {
        $data = [
            'tabel' => $request->tabel,
            'id_resepsionis' => $request->id_resepsionis,
            'nama_resepsionis' => $request->nama_resepsionis,
            'gambar_resepsionis' => $request->gambar_resepsionis,
            'id_keperluan' => $request->id_keperluan,
            'nama_keperluan' => $request->nama_keperluan
        ];

        return view('admin/edit', $data);
    }

    public function editResepsionis(Request $request)
    {
        $file_gambar = $request->file('gambar_resepsionis');

        if ($file_gambar == null) {
            $gambar_resepsionis = $request->gambar_lama;
        } else {
            $extension = $file_gambar->getClientOriginalExtension();
            $nama_file = date('mdYHis') . uniqid();
            $gambar_resepsionis = $nama_file . '.' . $extension;
            $file_gambar->move('asset', $gambar_resepsionis);
            unlink('asset/' . $request->gambar_lama);
        }

        DB::table('master_resepsionis')
            ->where('id_resepsionis', $request->id)
            ->update([
                'nama_resepsionis' => $request->nama_resepsionis,
                'gambar_resepsionis' => $gambar_resepsionis
            ]);

        return redirect()->route('home');
    }

    public function editKeperluan(Request $request)
    {
        DB::table('master_keperluan')
            ->where('id_keperluan', $request->id_keperluan)
            ->update([
                'nama_keperluan' => $request->nama_keperluan
            ]);

        return redirect()->route('home');
    }

    public function formTambah(Request $request)
    {
        $data = [
            'tabel' => $request->tabel
        ];

        return view('admin/tambah', $data);
    }

    public function tambahResepsionis(Request $request)
    {
        $file_gambar = $request->file('gambar_resepsionis');

        if ($file_gambar == null) {
            $gambar_resepsionis = 'default.jpg';
        } else {
            $extension = $file_gambar->getClientOriginalExtension();
            $nama_file = date('mdYHis') . uniqid();
            $gambar_resepsionis = $nama_file . '.' . $extension;
            $file_gambar->move('asset', $gambar_resepsionis);
        }

        $resepsionis = new MasterResepsionis();
        $resepsionis->nama_resepsionis = $request->nama_resepsionis;
        $resepsionis->gambar_resepsionis = $gambar_resepsionis;
        $resepsionis->save();

        return redirect()->route('home');
    }

    public function tambahKeperluan(Request $request)
    {
        $keperluan = new MasterKeperluan();
        $keperluan->nama_keperluan = $request->nama_keperluan;
        $keperluan->save();

        return redirect()->route('home');
    }
}
