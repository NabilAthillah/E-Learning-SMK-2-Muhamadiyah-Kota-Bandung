<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::limit(3)->get();
        $kelas = Kelas::limit(3)->get();
        $activity = Activity::limit(3)->get();
        return view('client.index', compact('mataPelajaran', 'kelas', 'activity'));
    }

    public function getSatu($id)
    {
        $data = Activity::where('id', $id)->first();
        return view('client.aktifitas.index', compact('data'));
    }
    public function getKursus()
    {
        $mataPelajaran = MataPelajaran::all();
        $kelas = Kelas::all();
        return view('client.kursus.index', compact('mataPelajaran', 'kelas'));
    }

    public function getGuru() {
        $guru = User::whereHas('roles', function ($query) {
            $query->where('name', 'guru');})->get();
        return view('client.guru.index', compact('guru'));
    }
}
