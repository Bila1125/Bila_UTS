<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('suplier.index', compact('supliers'));
    }

    public function create()
    {
        return view('suplier.create');
    }

    public function store(Request $request)
    {
        Suplier::create($request->all());
        return redirect()->route('suplier.index')->with('success', 'Suplier berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $suplier = Suplier::findOrFail($id);
        return view('suplier.edit', compact('suplier'));
    }

    public function update(Request $request, $id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->update($request->all());
        return redirect()->route('suplier.index')->with('success', 'Suplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->delete();
        return redirect()->route('suplier.index')->with('success', 'Suplier berhasil dihapus.');
    }
}
