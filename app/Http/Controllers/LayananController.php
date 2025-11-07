<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function perencanaanInvestasi()
    {
        // Menampilkan halaman view perencanaan investasi
        return view('layanan.perencanaan-investasi');
    }

    public function manajemenKeuangan()
{
    return view('layanan.manajemen-keuangan');
}

public function tabunganAnggaran()
{
    return view('layanan.tabungan-anggaran');
}

}
