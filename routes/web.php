<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('soil_sense');
});

Route::get('/soil-sense', function () {
    return view('soil_sense');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/cek-tanah', function (){
    return view('cek_tanah');
});

Route::post('/cek-tanah/save', function (Request $request) {
    $data = $request->only(['nitrogen', 'phosphorus', 'potassium', 'moisture']);
    return view('hasil_cek_tanah', $data);
});