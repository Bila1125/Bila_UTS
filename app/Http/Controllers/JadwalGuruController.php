<?php

namespace App\Http\Controllers;

use App\Models\JadwalGuru;
use App\Models\Guru;
use Illuminate\Http\Request;

class JadwalGuruController extends Controller
{
    public function index()
    {
        $jadwal = JadwalGuru::with('guru')->get();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $guru = \App\Models\Guru::all();
        return view('jadwal.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'kelas' => 'required',
            'mata_pelajaran' => 'required',
            'nip' => 'required|exists:gurus,nip'
        ]);

        JadwalGuru::create($request->all());

        return redirect()->route('jadwal-guru.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = JadwalGuru::findOrFail($id);
        $guru = \App\Models\Guru::all();
        return view('jadwal.edit', compact('jadwal', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'jam' => 'required',
            'kelas' => 'required',
            'mata_pelajaran' => 'required',
            'nip' => 'required|exists:gurus,nip'
        ]);

        $jadwal = JadwalGuru::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal-guru.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = JadwalGuru::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal-guru.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
