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

Route::get('relasi-1', function(){
    $mahasiswa=App\Models\Mahasiswa::where('nim','=','1015015072')->first();

    return $mahasiswa->wali->nama;
});

Route::get('relasi-2', function(){
    $mahasiswa=App\Models\Mahasiswa::where('nim','=','1015015072')->first();

    return $mahasiswa->dosen->nama;
});

Route::get('relasi-3',function(){
    $dosen = App\Models\Dosen::where('nama','=','Yulianto')->first();

    foreach ($dosen->mahasiswa as $data){
        echo "<li>Nama : <strong>".$data->nama."-"."</strong>".$data->nim."</li>";
    }
});

Route::get('relasi-4',function(){
   $novay = App\Models\Mahasiswa::where('nama','=','Noviyanto Rachmadi')->first();

   foreach($novay->hobi as $data){
    echo '<li>'.$data->hobi.'</li>';
   }
});

Route::get('relasi-5', function () {
    # Temukan hobi Mandi Hujan
    $mandi_hujan = App\Models\Hobi::where('hobi', '=', 'Mandi Hujan')->first();

    # Tampilkan semua mahasiswa yang punya hobi mandi hujan
    foreach ($mandi_hujan->mahasiswa as $temp) {
        echo '<li> Nama : ' . $temp->nama . ' <strong>' . $temp->nim . '</strong></li>';
    }

});

Route::get('eloquent', function () {
    # Ambil semua data mahasiswa (lengkap dengan semua relasi yang ada)
    $mahasiswa = App\Models\Mahasiswa::with('wali', 'dosen', 'hobi')->get();

    # Kirim variabel ke View
    return view('eloque', compact('mahasiswa'));
});