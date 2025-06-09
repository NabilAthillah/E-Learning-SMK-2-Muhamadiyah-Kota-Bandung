<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        return view('client.index');
    }

    public function getGuru() {
        return view('client.guru.index'); }

    public function getSatu() {
        return view('client.aktifitas.index'); }
    public function getKursus() {
        return view('client.kursus.index');
    }
}
