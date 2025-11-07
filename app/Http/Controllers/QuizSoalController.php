<?php

namespace App\Http\Controllers;

use App\Models\QuizSoal;
use Illuminate\Http\Request;

class QuizSoalController extends Controller
{
    public function index()
    {
        $soals = QuizSoal::all();
        return view('edukasi.QuizSoal.index', compact('soals'));
    }

    public function create()
    {
        return view('edukasi.QuizSoal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        QuizSoal::create($request->all());
        return redirect()->route('quiz_soal.index')->with('success', 'Soal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $soal = QuizSoal::findOrFail($id);
        return view('edukasi.QuizSoal.edit', compact('soal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
        ]);

        $soal = QuizSoal::findOrFail($id);
        $soal->update($request->all());

        return redirect()->route('quiz_soal.index')->with('success', 'Soal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $soal = QuizSoal::findOrFail($id);
        $soal->delete();

        return redirect()->route('quiz_soal.index')->with('success', 'Soal berhasil dihapus');
    }
}
