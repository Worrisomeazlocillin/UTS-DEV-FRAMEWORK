<?php

use App\Models\DaftarKomik;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarKomikController;



Route::get('/', function () {
    return view('welcome');
});
// Rak Buku
Route::resource('daftar_komik', DaftarKomikController::class);
