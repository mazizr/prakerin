<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('nama', 'NamaController@nama');
Route::get('buah', 'NamaController@buah');
Route::get('game', 'NamaController@game');
Route::get('hobi', 'NamaController@hobi');
Route::get('cita', 'NamaController@cita');
Route::resource('siswa', 'SiswaController');
Route::resource('sekolah', 'SekolahController');