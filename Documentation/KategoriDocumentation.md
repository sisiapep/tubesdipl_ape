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
#### Function create
Function create berfungsi untuk melakukan direct kedalam halaman create kategori
```php
public function create(Request $request)
{
	if (session('login') != '1'){
		return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
	}
	else{
		$request->session()->put('cek','TambahKategori');
		return view('admin.kategoriTambah');
	}
}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
Pada code dibawah berfungsi untuk melakukan redirect kedalam halaman tambah produk
```php
else{
	$request->session()->put('cek','TambahKategori');
	return view('admin.kategoriTambah');
}
```
#### Function Store
Pada function Store ini berfungsi untuk melakukan creat kategori baru dimana dalam function ini dilakukan validasi terlebih dahulu pada inputan yang dimasukan oleh user
```php
public function store(Request $request)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
			$request->validate([
			'nama_kategori' => 'required'
			]);
			Kategori::create($request->all());
			return redirect(url('admin-kategori'))->with('status','Data Kategori Berhasil Ditambahkan');
		}
	}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
Pada code dibawah berfungsi untuk melakukan redirect kedalam halaman tambah produk setelah ditambahkan kedalam database dengan fungsi ```Kategori::create($request->all());```
```php
else{
	$request->validate([
	'nama_kategori' => 'required'
	]);
	Kategori::create($request->all());
	return redirect(url('admin-kategori'))->with('status','Data Kategori Berhasil Ditambahkan');
}
```

#### Function edit
Function edit berfungsi untuk melakukan direct kedalam halaman edit kategori
```php
public function edit(Request $request,Kategori $kategoris)
{
	if (session('login') != '1'){
		return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
	}
	else{
		$request->session()->put('cek','Edit');
		return view('admin.kategoriTambah', compact('kategoris'));
	}
}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
code dibawah berfungsi untuk menyimpan session cek dan untuk melakukan direct kedalam halaman kategori tambah untuk dilakukan edit.
```php
else{
	$request->session()->put('cek','Edit');
	return view('admin.kategoriTambah', compact('kategoris'));
}
```
#### Function Update
Function Update berfungsi untuk melakukan validasi sebelum melakukan update pada data yang telah ada
```php
public function update (Request $request, Kategori $kategoris)
{
	if (session('login') != '1'){
		return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
	}
	else{
		Kategori::where('id', $kategoris->id)
			->update([
			'nama_kategori' => $request->nama_kategori
			]);
		return redirect(url('admin-kategori'))->with('status','Data Kategori Berhasil Diganti');
	}
}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
pada code ini berfungsi untuk melakukan update pada database dan apabila sukses maka akan melakukan redirect kedalam page kategori
```php
else{
	Kategori::where('id', $kategoris->id)
		->update([
		'nama_kategori' => $request->nama_kategori
	]);
	return redirect(url('admin-kategori'))->with('status','Data Kategori Berhasil Diganti');
}
```
#### Function Destroy
Pada Destroyer ini berfungsi untuk melakukan delete data
```php
public function destroy(Kategori $kategoris)
{
	if (session('login') != '1'){
		return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
	}
	else{
		Kategori::destroy($kategoris->id);
		return redirect(url('admin-kategori'))->with('status','Data Kategori Berhasil Dihapus');
	}
}
```
