<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';
	protected $fillable = ['nama_produk','harga_produk','id_kategori','gambar','des_produk'];
}
