<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ArtisController;
use App\Http\Controllers\ProduserController;
use App\Http\Controllers\HomeController;

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

Route::get('/',  [HomeController::class, 'show']);
Route::get('halo', function () {
	return "Halo, Selamat datang di tutorial laravel www.malasngoding.com";
});
Route::get('blog', function () {
	return view('blog');
});
Route::get('/film', [FilmController::class, 'show']);
Route::get('/film/tambah',[FilmController::class, 'add']);
Route::post('/Film/store',[FilmController::class, 'store']);
Route::get('/film/edit/{id}',[FilmController::class, 'edit']);
Route::post('/film/update',[FilmController::class, 'update']);
Route::get('/film/hapus/{id}',[FilmController::class, 'delete']);

Route::get('/artis', [ArtisController::class, 'show']);
Route::get('/artis/tambah',[ArtisController::class, 'add']);
Route::post('/artis/store',[ArtisController::class, 'store']);
Route::get('/artis/edit/{id}',[ArtisController::class, 'edit']);
Route::post('/artis/update',[ArtisController::class, 'update']);
Route::get('/artis/hapus/{id}',[ArtisController::class, 'delete']);
