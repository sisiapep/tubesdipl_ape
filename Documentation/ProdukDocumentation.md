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
Function create berfungsi untuk melakukan direct kedalam halaman create produk
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
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
Pada code dibawah berfungsi untuk melakukan redirect kedalam halaman tambah produk
```php
else{
	$request->session()->put('cek','Tambah');
	return view('admin.produkTambah');
}
```

#### Function store
Pada function Store ini berfungsi untuk melakukan create produk(event) baru dimana dalam function ini dilakukan validasi terlebih dahulu pada inputan yang dimasukan oleh user
```php
	public function store(Request $request)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
		$request->validate([
				'nama_produk' => 'required',
				'harga_produk'=> 'required|numeric',
				'id_kategori'=> 'required',
				'des_produk'=> 'required',
				'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
		]);
		$file = $request->file('file');
 
		$nama_file = time().$request->file->extension();
		Produk::create([
			'id' => rand(1,1000000000),
			'nama_produk' => $request->nama_produk,
			'harga_produk' => $request->harga_produk,
			'id_kategori' => $request->id_kategori,
			'des_produk' => $request->des_produk,
			'gambar' => $nama_file
		]); 
      	        // isi dengan nama folder tempat kemana file diupload
		$file->move(public_path('uploads'),$nama_file);
		return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Ditambahkan');
		}
	}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
Code dibawah berfungsi untuk melakukan validasi terhadap input dari user dimana input user harus sesuai dengan yang diminta.
```php
$request->validate([
	'nama_produk' => 'required',
	'harga_produk'=> 'required|numeric',
	'id_kategori'=> 'required',
	'des_produk'=> 'required',
	'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
]);
```
pada code ini berfungsi untuk memasukan request file photo kedalam variabel ``` $file ```
```php
$file = $request->file('file');
```
pada code dibawah berfungsi untuk memasukan file inputan kedalam bentuk array product yang nanti nya akan dilakukan get pada function create
```php
$nama_file = time().$request->file->extension();
		Produk::create([
			'id' => rand(1,1000000000),
			'nama_produk' => $request->nama_produk,
			'harga_produk' => $request->harga_produk,
			'id_kategori' => $request->id_kategori,
			'des_produk' => $request->des_produk,
			'gambar' => $nama_file
		]); 
```
pada code ini berfungsi untuk memasukan file kedalam folder yang ditentukan
```php
$file->move(public_path('uploads'),$nama_file);
```
setelah selesai akan melakukan return ke halaman produk dengan menampilkan alert produk berhasil ditambahkan
```php
return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Ditambahkan');
```
#### Function edit
Function edit berfungsi untuk melakukan direct kedalam halaman edit produk
```php
	public function edit(Request $request,Produk $produks)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
			$request->session()->put('cek','Edit');
			return view('admin.produkTambah', compact('produks'))->with('form','Edit');
		}
	}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
code dibawah berfungsi untuk menyimpan session cek dan untuk melakukan direct kedalam halaman produk tambah untuk dilakukan edit.
```php
else{
	$request->session()->put('cek','Edit');
	return view('admin.produkTambah', compact('produks'))->with('form','Edit');
}
```
#### Function update
Function Update berfungsi untuk melakukan validasi sebelum melakukan update pada data yang telah ada
```php
public function update (Request $request, Produk $produks)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
		$request->validate([
				'nama_produk' => 'required',
				'harga_produk'=> 'required|numeric',
				'id_kategori'=> 'required',
				'des_produk'=> 'required',
				'file' => 'file|image|mimes:jpeg,png,jpg|max:2048'
		]);
		if ($request->file == null){
			Produk::where('id', $produks->id)
				->update([
				'nama_produk' => $request->nama_produk,
				'harga_produk' => $request->harga_produk,
				'id_kategori' => $request->id_kategori,
				'des_produk' => $request->des_produk,
				]);
		}
		else{
		$file = $request->file('file');
		$nama_file = time().$request->file->extension();
		Produk::where('id', $produks->id)
				->update([
				'nama_produk' => $request->nama_produk,
				'harga_produk' => $request->harga_produk,
				'id_kategori' => $request->id_kategori,
				'des_produk' => $request->des_produk,
				'gambar' => $nama_file
				]);
		$file->move(public_path('uploads'),$nama_file);
		}
		return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Diganti');
		}
}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
Code dibawah berfungsi untuk melakukan validasi terhadap input produk
```php
else{
		$request->validate([
				'nama_produk' => 'required',
				'harga_produk'=> 'required|numeric',
				'id_kategori'=> 'required',
				'des_produk'=> 'required',
				'file' => 'file|image|mimes:jpeg,png,jpg|max:2048'
]);
```
code dibawah dapat berjalan apabila request file bernilai nul, lalu dalam code ini akan dilakukan pencarian pada database berdasarkan id user dan disimpan pada produk untuk dilakukan update
```php
if ($request->file == null){
			Produk::where('id', $produks->id)
				->update([
				'nama_produk' => $request->nama_produk,
				'harga_produk' => $request->harga_produk,
				'id_kategori' => $request->id_kategori,
				'des_produk' => $request->des_produk,
				]);
}
```
code ini akan berjalan apabila file request tidak bernilai null perintah yang dilakukan sama seperti diatas yang membedakan adalah terdapat entitas gambar
```php
else{
		$file = $request->file('file');
		$nama_file = time().$request->file->extension();
		Produk::where('id', $produks->id)
				->update([
				'nama_produk' => $request->nama_produk,
				'harga_produk' => $request->harga_produk,
				'id_kategori' => $request->id_kategori,
				'des_produk' => $request->des_produk,
				'gambar' => $nama_file
				]);
		$file->move(public_path('uploads'),$nama_file);
}
```
melakukan redirect kedalam halaman admin produk dan memberikan alert data produk berhasil diganti
```php
return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Diganti');
```
#### Function destroy
Pada Destroyer ini berfungsi untuk melakukan delete data
```php
public function destroy(Produk $produks)
	{
		if (session('login') != '1'){
			return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
		}
		else{
		Produk::destroy($produks->id);
		return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Dihapus');
		}
	}
```
Code dibawah berfungsi untuk melakukan validasi apakah user telah login atau belum, apabila belum login maka akan di redirect kedalam menu login dan akan diberikan alert
```php
if (session('login') != '1'){
  return redirect(url('login'))->with('alert','Anda belum login, silahkan login terlebih dahulu');
}
```
pada code ini berfungsi untuk melakukan delete data pada databse dengan menggunakan fungsi destroy
```php
else{
		Produk::destroy($produks->id);
		return redirect(url('admin-produk'))->with('status','Data Produk Berhasil Dihapus');
}
```
