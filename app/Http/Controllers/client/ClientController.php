<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Pastikan model ini di-import

class ClientController extends Controller
{
    public function index() {
        return view('client.index');
    }

    public function getGuru() {
        $guru = User::whereHas('roles', function ($query) {
            $query->where('name', 'guru');})->get();
        return view('client.guru.index', compact('guru'));
    }


    public function getSatu() {
        return view('client.aktifitas.index');
    }

    public function getKursus() {
        return view('client.kursus.index');
    }
}
