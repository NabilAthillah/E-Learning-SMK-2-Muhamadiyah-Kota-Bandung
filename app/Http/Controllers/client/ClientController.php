<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class ClientController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('client.index', compact('mataPelajaran', 'kelas'));
    }

    public function getGuru()
    {
        $guru = User::role('guru')->get();
        return view('client.guru.index', compact('guru'));

    }

    public function getSatu()
    {
        return view('client.aktifitas.index');
    }
    public function getKursus()
    {
        $mataPelajaran = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('client.kursus.index', compact('mataPelajaran', 'kelas'));
    }
}
