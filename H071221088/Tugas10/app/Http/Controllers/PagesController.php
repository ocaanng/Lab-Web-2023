<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Kelas;

class PagesController extends Controller
{
    public function index()
    {
        return view('halaman.login');
    }

    public function adminpage() {
        $data = [
            'title' => 'Admin - Dashboard',
            'totalUser' => User::count(),
            'totalKelas' => Kelas::count(),
            'users' => User::all(),
            'kelasList' => Kelas::all(),
        ];

        return view('halaman.adminpage', $data);
    }

    public function studentpage() {
        $this->var = [
            'title' => 'Admin - Kelas',
            'kelasList' => kelas::all()
        ];
        return view('halaman.dashboard', $this->var);
    }

    public function halamankelas() {
        $this->var = [
            'kelasList' => kelas::all()
        ];
        return view('halaman.dashboard_kelas', $this->var);
    }

    public function pageberanda() {
        $this->var = [
            'title' => 'Admin - Kelas',
            'kelasList' => kelas::all()
        ];
        return view('halaman.beranda', $this->var);
    }
}
