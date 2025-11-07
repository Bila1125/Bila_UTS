<?php

namespace App\Http\Controllers;

use App\Models\Mentor;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::all();
        return view('edukasi.Mentor.index', compact('mentors'));
    }

    public function create()
    {
        return view('edukasi.Mentor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'bidang_keahlian' => 'nullable|string|max:255',
        ]);

        Mentor::create($request->all());
        return redirect()->route('mentor.index')->with('success', 'Data mentor berhasil ditambahkan.');
    }

    public function edit(Mentor $mentor)
    {
        return view('edukasi.Mentor.edit', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'bidang_keahlian' => 'nullable|string|max:255',
        ]);

        $mentor->update($request->all());
        return redirect()->route('mentor.index')->with('success', 'Data mentor berhasil diperbarui.');
    }

    public function destroy(Mentor $mentor)
    {
        $mentor->delete();
        return redirect()->route('mentor.index')->with('success', 'Data mentor berhasil dihapus.');
    }
}
