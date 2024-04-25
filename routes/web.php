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
    return view('welcome');
});

// variabel
Route::get('/about', function () {

    $nama ="Dimas Yudistira";
    $jk ="Laki laki";
    $pa ="Smk";
    $pe ="Programer";
    $a ="Sekeawi";

    return view('data_diri', compact('nama','jk','pa','pe','a'));
});

Route::get('/latihan', function () {
    $nama = "Dimas Yudistira";
    $jk = "Laki laki";
    $lahir = "20 April 2007";
    $hobi = "Maen ML";
    $cita = "Gamer";

    return view('latihan',compact('nama','jk','lahir','hobi','cita'));
});

Route::get('/about2/{nama}/{jk}/{alamat}', function (Request $request , $nama , $jk ,$alamat) {
    $nama2 = $nama;
    $jk2 = $jk;
    $alamat2 = $alamat;

    return view('bio',compact('nama2','jk2','alamat2'));
});