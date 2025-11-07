<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonsultasiPajakController extends Controller
{
    // Halaman utama konsultasi pajak
    public function index()
    {
        return view('konsultasi.pajak');
    }

    // Proses simpan/kirim pertanyaan konsultasi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:100',
            'pertanyaan' => 'required|string|max:1000',
        ]);

        // Untuk saat ini kita simpan ke log dulu (contoh)
        \Log::info('Konsultasi Pajak Masuk:', $request->all());

        return back()->with('success', 'Pertanyaan berhasil dikirim!');
    }
}
