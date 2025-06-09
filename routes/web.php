<?php

use App\Http\Controllers\client\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::name('client.')->controller(ClientController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/guru', 'getGuru')->name('guru');
    Route::get('/bihalal/{id}', 'getSatu')->name('bihalal');
    Route::get('/kursus', 'getKursus')->name('kursus');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });
});


