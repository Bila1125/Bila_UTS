<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // Menampilkan semua siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    // Menampilkan form tambah siswa
    public function create()
    {
        return view('siswa.create');
    }

    // Menyimpan data siswa
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:siswa,nim',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // Menampilkan form edit siswa
    public function edit($nim)
    {
        $siswa = Siswa::findOrFail($nim);
        return view('siswa.edit', compact('siswa'));
    }

    // Memperbarui data siswa
    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = Siswa::findOrFail($nim);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Menghapus data siswa
    public function destroy($nim)
    {
        $siswa = Siswa::findOrFail($nim);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
