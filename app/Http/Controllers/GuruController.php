<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus',
            'nama' => 'required',
            'no_hp' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($nip)
    {
        $guru = Guru::findOrFail($nip);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $nip)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'mapel' => 'required',
            'alamat' => 'required',
        ]);

        $guru = Guru::findOrFail($nip);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy($nip)
    {
        $guru = Guru::findOrFail($nip);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}
