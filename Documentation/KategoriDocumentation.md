# Membuat Tampilan websit (FrontEnd)
untuk membuat tampilan website disini kita menggunakan HTML, CSS, Dan Bootstrap.untuk code lengkap FrontEnd dapat dilihat pada link dibawah
    
      https://github.com/sisiapep/tubesdipl_ape/blob/main/resources/views/admin/kategori.blade.php
      https://github.com/sisiapep/tubesdipl_ape/blob/main/resources/views/admin/kategoriTambah.blade.php
      
# Membuat Fungsionalitas Website(BackEnd)
### Model Kategori
Pada modul kategori ini berfungsi untuk menentukan tabel mana yang akan dipakai dengan menggunakan ```protected $table = 'kategoris';``` dan menentukan atribut yang dapat dipakai dengan menggunakan dengan ```protected $fillable = ['nama_kategori'];```
```php
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
	protected $fillable = ['nama_kategori'];
}
>
```
### Controller Kategori
Dalam Controller Kategori ini terdapat beberapa function yang dibuat agar fungsionalitas pada Kategori berjalan semestinya. untuk code lengkap dapat dilihat pada link dibawah

    https://github.com/sisiapep/tubesdipl_ape/blob/main/app/Http/Controllers/KategoriController.php
    
#### Function index
Dalam Function ini melakukan pengambilan data kategori dan mereturn kedalam page kategori
```php
public function index()
{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
		        $kategoris = Kategori::all();
            return view('admin.kategori', compact('kategoris'));
		}
}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
code dibawah berfungsi untuk melakukan pengambilan semua data Kategori dan melakukan redirect kedalam halaman kategori
```php
else{
  $kategoris = Kategori::all();
  return view('admin.kategori', compact('kategoris'));
}
```
