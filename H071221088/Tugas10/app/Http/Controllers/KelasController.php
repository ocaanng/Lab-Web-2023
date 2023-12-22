<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Comment;


class KelasController extends Controller
{
    public function index() {
        $this->var = [
            'title' => 'Admin - Kelas',
            'kelas' => kelas::all()
        ];
        return view('admin.kelas.index', $this->var);
    }

    public function show($namaKelas)
    {
        $kelas = Kelas::where('nama', $namaKelas)->firstOrFail();

        return view('halaman.kelaspage', ['kelas' => $kelas]);
    }

    public function addComment(Request $request, Kelas $kelas)
    {
        $request->validate([
            'user_name' => 'required|string',
            'comment_text' => 'required|string',
        ]);
    
        $comment = new Comment([
            'user_name' => $request->input('user_name'),
            'comment_text' => $request->input('comment_text'),
            'kelas_id' => $request->input('kelas_id')
        ]);
    
        $comment->save();
    
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
    
}

