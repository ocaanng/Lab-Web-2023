<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Kelas; 

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Admin - Dashboard',
            'totalUser' => User::count(),
            'totalKelas' => Kelas::count(),
            'users' => User::all(),
            'kelasList' => Kelas::all(),
        ];

        return view('halaman.adminpage', $data);
    }

        // Fungsi untuk menampilkan form tambah kelas (jika diperlukan)
        public function createKelasForm()
        {
            return view('halaman.adminkelasbuat');
        }
    
        public function storeKelas(Request $request)
        {
            // Validasi input sesuai kebutuhan
            $request->validate([
                'nama' => 'required',
                'pengajar' => 'required',
                'deskripsi' => 'required',
                'materi' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'link' => 'required|url',
            ]);
        
            // Handle file upload
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        
            // Simpan kelas baru dengan menyertakan 'link' field
            Kelas::create([
                'nama' => $request->input('nama'),
                'pengajar' => $request->input('pengajar'),
                'deskripsi' => $request->input('deskripsi'),
                'materi' => $request->input('materi'),
                'thumbnail' => $thumbnailPath, // Set 'thumbnail' to the path where the file is stored
                'link' => $request->input('link', 'link eror'), // Use the default value if 'link' is not present
            ]);
        
            return redirect()->route('backpage')->with('success', 'Kelas berhasil ditambahkan');
        }
        
        public function updateKelas(Request $request, $id)
{
    // Validasi input sesuai kebutuhan
    $request->validate([
        'nama' => 'required',
        'pengajar' => 'required',
        'deskripsi' => 'required',
        'materi' => 'required',
        'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'link' => 'required|url',
    ]);

    // Temukan kelas yang akan diupdate
    $kelas = Kelas::findOrFail($id);

    // Update data kelas
    $kelas->update([
        'nama' => $request->input('nama'),
        'pengajar' => $request->input('pengajar'),
        'deskripsi' => $request->input('deskripsi'),
        'materi' => $request->input('materi'),
        'link' => $request->input('link'),
    ]);

    // Handle file upload jika thumbnail diubah
    if ($request->hasFile('thumbnail')) {
        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        $kelas->update(['thumbnail' => $thumbnailPath]);
    }

    return redirect()->route('backpage')->with('success', 'Kelas berhasil diperbarui');
}

        
        
        // Fungsi untuk menampilkan form edit kelas (jika diperlukan)
        public function editKelasForm($id)
        {
            $kelas = Kelas::findOrFail($id);
            return view('halaman.adminkelasedit', compact('kelas'));
        }
    
        // Fungsi untuk menghapus kelas (jika diperlukan)
        public function deleteKelas($id)
        {
            $kelas = Kelas::findOrFail($id);
            $kelas->delete();
    
            return redirect()->route('backpage')->with('success', 'Kelas berhasil dihapus');
        }

        public function deleteUser($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
        
            return redirect()->route('backpage')->with('success', 'User berhasil dihapus');
        }
    public function backpage()
    {
        return redirect()->route('adminpage');
    }
     
}
