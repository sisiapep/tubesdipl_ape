
@extends('layout.layout')
@section('content')
<!--Section: Block Content-->
<section class="produk-detail">
<div class="container-fluid ">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
		<?php
		$link = mysqli_connect("127.0.0.1", "root", "", "ape");
		$kat2 = $produks->id_kategori;
		$result4 = mysqli_query($link,"SELECT * from kategoris where id = '$kat2'");
				while ($row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC)){
					$nama = $row4['nama_kategori'];
				}
				?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $nama?></li>
    </ol>
    </nav>
    <div class="row">
        <div class="col-md-6 produk-detail-image">
            <img src="{{ url('uploads') }}/{{ $produks->gambar }}" class="shadow-sm img-fluid produk-detail-image">  
        </div>
        <div class="col-md-6 produk-detail-text pl-5 pr-5">
            <h3 class="produk-title">{{ $produks->nama_produk }}</h3>
            <p class="produk-description">{{$produks->des_produk}}</p>
            <h4 class="harga">Rp. {{ number_format($produks->harga_produk)}}</h4>
            <button type="button" class="col-md-6 col-sm-12 btn btn-detail mt-2"><i class="fa fa-phone" aria-hidden="true"></i> Beli Sekarang</button>
        </div>
    </div>
</div>
</section>

<div class="iklan text-center shadow-sm">
    <div class="row">
        <div class="col-md-4">
            <i class="fa fa-check-circle-o fa-2x " aria-hidden="true"></i>
            <p class="text-iklan text-center">Garansi Busa Selama 1 Tahun</p>
        </div>
        <div class="col-md-4">
            <i class="fa fa-truck fa-2x" aria-hidden="true"></i>
            <p class="text-iklan text-center">Gratis Ongkir Sampai Tujuan Anda</p>
        </div>
        <div class="col-md-4">
            <i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>
            <p class="text-iklan text-center">Pembayaran  Setelah Barang Sampai Di Rumah Anda</p>
        </div>
    </div>
</div>

<div class="container produk-terkait">
    <div class="text-center"><h4 class="head-sofa mb-5 mt-5">Produk Terkait</h4></div>
    <div class="row">
		<?php
		$kat = $produks->id_kategori;
		$prod = $produks->id;
		$result = mysqli_query($link,"SELECT * from produks where id_kategori = '$kat' AND id != '$prod' order by id DESC limit 3");
		while ($row2 = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		?>
        <div class="col-lg-4 col-md-6 col-sm-4 card mb-5">
			<a href="{{url('/produk-detail/')}}/<?php echo @$row2['id']?>">
                <img src="{{ url('uploads') }}/<?php echo $row2['gambar']?>" class="card-img-top" alt="...">
			</a>
            <div class="card-body">
                <h4 class="card-text-heading"><?php echo $row2['nama_produk']?></h4>
                <p class="card-text">
				<?php
				$result2 = mysqli_query($link,"SELECT * from kategoris where id = '$kat'");
				while ($row3 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
					echo $row3['nama_kategori'];
				}
				?>
				</p>
                <p class="card-text-price pb-0"><?php echo "Rp. ".number_format($row2['harga_produk']) ?></p>
            </div>
        </div>
		<?php }?>
    </div>
</div>
<!--Section: Block Content-->
@endsection

@section('js')
<script>

</script>
@endsection