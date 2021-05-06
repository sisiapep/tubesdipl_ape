# Membuat Tampilan Website(FrontEnd)
untuk membuat tampilan website disini kita menggunakan HTML, CSS, Dan Bootstrap.
#### Untuk code lengkap FrontEnd dapat dilihat pada link dibawah
    https://github.com/sisiapep/tubesdipl_ape/tree/main/resources/views/produk
# Membuat Fungsionalitas Website(BackEnd)
### Model Produk
Model Produk Berfungsi untuk melakukan deklarasi table yang akan dipakai dan atribut apa yang diizinkan untuk dipakai pada Produk
```PHP
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
	protected $fillable = ['id','nama_produk','harga_produk','id_kategori','gambar','des_produk'];
}
?>
```
### Controller Produk
Dalam Controller Produk ini terdapat beberapa function yang dibuat agar fungsionalitas pada Produk berjalan semestinya. Untuk code lengkap dapat dilihat pada link dibawah.
    https://github.com/sisiapep/tubesdipl_ape/blob/main/app/Http/Controllers/ProdukController.php
#### Function __construct
Contructor ini berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```PHP
public function __construct()
    {
        if(!session('login')){
            return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
    }
```
#### Function index
Pada Function ini kita akan melakukan pemanggilan pada semua data produk dan mereturn ke halaman produk
```PHP
public function index()
    {
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
		$produks = Produk::all();
        return view('admin.produk', compact('produks'));
		}
    }
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
code dibawah berfungsi untuk melakukan pengambilan semua data product dan melakukan redirect kedalam halaman produk
```php
else{
  $produks = Produk::all();
  return view('admin.produk', compact('produks'));
}
```
#### Function create
Function create berfungsi sebagai 
```php
public function create(Request $request)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
                        $request->session()->put('cek','Tambah');
                        return view('admin.produkTambah');
		}
	}
```
