<?php

namespace App\Http\Controllers;

use App\Models\ForumReply;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumReplyController extends Controller
{
    /**
     * Tampilkan semua forum replies
     */
    public function index()
    {
        $replies = ForumReply::with(['forum', 'user'])
            ->latest()
            ->paginate(10);

        return view('forum_replies.index', compact('replies'));
    }

    /**
     * Simpan balasan baru ke forum
     */
    public function store(Request $request, $forumId)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        ForumReply::create([
            'forum_id' => $forumId,
            'user_id'  => Auth::id(),
            'reply'    => $request->reply,
        ]);

        return redirect()->route('forum.show', $forumId)
            ->with('success', 'Balasan berhasil ditambahkan.');
    }

    /**
     * Hapus balasan tertentu
     */
    public function destroy($id)
    {
        $reply = ForumReply::findOrFail($id);
        $forumId = $reply->forum_id;

        // Pastikan hanya pemilik balasan / admin yang bisa hapus
        if ($reply->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return redirect()->route('forum.show', $forumId)
                ->with('error', 'Kamu tidak punya izin untuk menghapus balasan ini.');
        }

        $reply->delete();

        return redirect()->route('forum.show', $forumId)
            ->with('success', 'Balasan berhasil dihapus.');
    }
}
