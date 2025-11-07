<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = Aktivitas::all();
        return view('edukasi.Aktivitas.index', compact('aktivitas'));
    }

    public function create()
    {
        return view('edukasi.Aktivitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required|date',
        ]);

        Aktivitas::create($request->all());

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('edukasi.Aktivitas.edit', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update($request->all());

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil dihapus.');
    }
}
