# Membuat Tampilan websit (FrontEnd)
untuk membuat tampilan website disini kita menggunakan HTML, CSS, Dan Bootstrap.
#### untuk code lengkap FrontEnd dapat dilihat pada link dibawah
    https://github.com/sisiapep/tubesdipl_ape/blob/main/resources/views/home/home.blade.php
# Membuat Fungsionalitas Website(BackEnd)
### Controller Login
Dalam Controller Home ini terdapat beberapa function yang dibuat agar fungsionalitas pada Home berjalan semestinya. 
```php
<?php

namespace App\Http\Controllers;
use App\Produk;
use App\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $produks = Produk::paginate(6);
        return view('home.home', compact('produks'));
    }
    public function kategori()
    {   
        $kategoris = Kategori::all();
        return view('layout.layout', compact('kategoris'));
    }
	
	public function show(Produk $produks)
	{
		return view('produk.produkDetail', compact('produks'));
	}
}

```
#### Function index
Dalam Function ini melakukan pengambilan data produk dan mereturn kedalam page Home
```php
public function index()
  {
    $produks = Produk::paginate(6);
    return view('home.home', compact('produks'));
  }
```
#### Function kategori
Dalam Function ini melakukan pengambilan data kategori dan mereturn kedalam page layout
```php
public function kategori()
    {   
        $kategoris = Kategori::all();
        return view('layout.layout', compact('kategoris'));
    }
```
#### Function show
Dalam Function ini menampilkan data product dan mereturn kedalam page produk
```php
public function show(Produk $produks)
	{
		return view('produk.produkDetail', compact('produks'));
	}
```
