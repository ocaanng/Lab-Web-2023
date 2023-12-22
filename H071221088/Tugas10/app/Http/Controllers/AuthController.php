<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('halaman.register');
    }

// AuthController.php

public function process_login(Request $req)
{
    $req->validate([
        'name' => 'required|min:4|max:255',
        'password' => 'required|min:4|max:255',
    ]);

    // Mencoba mengotentikasi pengguna
    if (Auth::attempt(['name' => $req->name, 'password' => $req->password])) {
        $user = Auth::user();

        // Memastikan objek pengguna tidak null sebelum mengakses properti
        if ($user) {
            if ($user->role == 'admin') {
                return redirect('/E-learn/admin');
            } elseif ($user->role == 'teacher') {
                return redirect('/E-learn/teacher');
            } elseif ($user->role == 'student') {
                return redirect('/E-learn/student');
            } else {
                return redirect('/E-learn');
            }
        } else {
            // Menangani kasus di mana objek pengguna null
            return '<script>alert("Akses Ditolak, Pengguna tidak ditemukan"); window.location.href = "/";</script>';
        }
    } else {
        return '<script>alert("Akses Ditolak, Email atau Password Anda Salah"); window.location.href = "/";</script>';
    }
}



    public function process_register(Request $req)
    {
        $req->validate([
            'name' => 'required|min:2|max:255',
            'password' => 'required',
            'role' => 'required|in:admin,teacher,student', // Tambahkan validasi untuk peran
        ]);

        $data = $req->all();
        $data['password'] = bcrypt($req->password);

        // Tambahkan validasi untuk mengatur peran
        if ($data['role'] == 'admin' || $data['role'] == 'teacher' || $data['role'] == 'student') {
            $data['role'] = $data['role'];
        } else {
            $data['role'] = 'student'; // Peran default jika tidak sesuai dengan yang diizinkan
        }

        User::create($data);
        return '<script>alert("Registrasi Berhasil, Silahkan Login Terlebih Dahulu!"); window.location.href = "/";</script>';
    }
    public function logout()
    {
        if(Auth::user()){
            Auth::logout();
            return redirect('/');
        }else{
            return redirect()->back();
        }
    }
}
