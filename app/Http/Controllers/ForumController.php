<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Tampilkan semua forum
     */
    public function index()
    {
        $forums = Forum::with('user')->latest()->get();
        return view('forum.index', compact('forums'));
    }

    /**
     * Form buat forum baru
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Simpan forum baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Forum::create([
            'user_id' => Auth::id(), // ambil user login
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dibuat.');
    }

    /**
     * Detail forum
     */
    public function show($id)
    {
        $forum = Forum::with('user')->findOrFail($id);
        return view('forum.show', compact('forum'));
    }

    /**
     * Form edit forum
     */
    public function edit($id)
    {
        $forum = Forum::findOrFail($id);
        return view('forum.edit', compact('forum'));
    }

    /**
     * Update forum
     */
    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $forum->update($request->only(['title', 'content']));

        return redirect()->route('forum.index')->with('success', 'Forum berhasil diperbarui.');
    }

    /**
     * Hapus forum
     */
    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        $forum->delete();

        return redirect()->route('forum.index')->with('success', 'Forum berhasil dihapus.');
    }
}
