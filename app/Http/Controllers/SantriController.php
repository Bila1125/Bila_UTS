<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santri = Santri::all();
        return view('edukasi.Santri.index', compact('santri'));
    }

    public function create()
    {
        return view('edukasi.Santri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Santri::create($request->all());

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        return view('edukasi.Santri.edit', compact('santri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $santri = Santri::findOrFail($id);
        $santri->update($request->all());

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri.index')->with('success', 'Data santri berhasil dihapus.');
    }
}
