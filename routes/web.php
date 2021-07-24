<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('landing.home');

Route::get('/department', function () {
    return view('department');
})->name('department.home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile.home');

Route::get('/berita', function () {
    $berita = DB::table('berita_test')->paginate(6);
    return view('berita.index', ['berita' => $berita]);
})->name('berita.home');

Route::get('/berita/berita-1', function() {
  return view('berita.view');
})->name('berita.view');
