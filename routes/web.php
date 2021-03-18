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
    return view('home.home');
});
 Route::get('admin/login', function () {
     return view('admin.login');
 });
Route::get('/', 'HomeController@index');

Route::get('produk-detail/{produks}','HomeController@show');

// Admin
Route::get('admin', function () {
    return view('admin.dashboard');
});

Route::get('admin-produk', 'ProdukController@index');
Route::get('produk-kategori/{id}', 'KategoriProdukController@index');
Route::get('login', 'LoginController@login');
Route::post('doLogin', 'LoginController@loginPost');
Route::patch('EditKategori/{kategoris}', 'KategoriController@Update');
Route::get('admin-kategori', 'KategoriController@index');
Route::get('logout', 'LoginController@logout');
Route::get('admin-kategori-tambah', 'KategoriController@create');
Route::get('admin-kategori-edit/{kategoris}', 'KategoriController@edit');
Route::get('admin-kategori-hapus/{kategoris}', 'KategoriController@destroy');
Route::get('admin-produk-tambah', 'ProdukController@create');
Route::get('admin-produk-edit/{produks}', 'ProdukController@edit');
Route::get('admin-produk-hapus/{produks}', 'ProdukController@destroy');
Route::post('Tambah', 'ProdukController@store');
Route::post('TambahKategori', 'KategoriController@store');
Route::patch('Edit/{produks}', 'ProdukController@Update');
Route::patch('EditKategori/{kategoris}', 'KategoriController@Update');