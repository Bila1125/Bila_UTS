<?php

namespace App\Http\Controllers;

use App\Models\AktivitasInteraktif;
use Illuminate\Http\Request;

class AktivitasInteraktifController extends Controller
{
    public function index()
    {
        $aktivitas = AktivitasInteraktif::all();
        return view('edukasi.AktivitasInteraktif.index', compact('aktivitas'));
    }

    public function create()
    {
        return view('edukasi.AktivitasInteraktif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'kategori' => 'nullable|string|max:100',
        ]);

        AktivitasInteraktif::create($request->all());

        return redirect()->route('aktivitas_interaktif.index')->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $aktivitas = AktivitasInteraktif::findOrFail($id);
        return view('edukasi.AktivitasInteraktif.edit', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'kategori' => 'nullable|string|max:100',
        ]);

        $aktivitas = AktivitasInteraktif::findOrFail($id);
        $aktivitas->update($request->all());

        return redirect()->route('aktivitas_interaktif.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aktivitas = AktivitasInteraktif::findOrFail($id);
        $aktivitas->delete();

        return redirect()->route('aktivitas_interaktif.index')->with('success', 'Aktivitas berhasil dihapus.');
    }
}
