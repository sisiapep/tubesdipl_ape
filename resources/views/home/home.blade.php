@extends('layout.layout')
@section('content')
<!-- Carousel -->
<div class="">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('assets')}}/images/APE-Car-1.jpeg" class="carousel-img w-100 d-block" alt="{{asset('assets')}}/images/carousel1.png">
                </div>
                <div class="carousel-item">
                <img src="{{asset('assets')}}/images/APE-Car-2.jpeg" class="carousel-img w-100 d-block" alt="{{asset('assets')}}/images/carousel2.png">
                </div>
                <div class="carousel-item">
                <img src="{{asset('assets')}}/images/APE-Car-3.jpeg" class="carousel-img w-100 d-block" alt="{{asset('assets')}}/images/carousel3.png">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next ml-5" href="#carouselExampleIndicators" role="button" data-slide="next">
                <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

  <!-- who are we -->
  <div class="container mb-5 py-5 px-5 bg-light mx-auto" style="background-color:;">
        <div class="row ">
            <div class="who-container col-md-5 col-12 row mt-2 mx-auto">
                <h3>Tentukan Event Keinginan Anda<span> </span></h3>
            </div>
            <div class="who-container col-md-6 col-12 mt-2 mx-auto">
                <p>Carilah event yang sesuai dengan hatimu, 
                    daftarkan dirimu kapanpun dimanapun dengan APE</p>
            </div>
        </div>
    </div>
	<?php
		$link = mysqli_connect("127.0.0.1", "root", "", "ape");
		$result = mysqli_query($link, "SELECT * FROM kategoris ORDER by id ASC limit 3");
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
	?>
<div class="container mt-5">
    <div class="text-center"><h4 class="head-Event mb-5"><?php echo @$row['nama_kategori'];?></h4></div>
    <div class="row">
	<?php 
			$kat = $row['id'];
			$result2 = mysqli_query($link, "SELECT * FROM produks WHERE produks.id_kategori = '$kat' ORDER by produks.id_kategori DESC limit 6");
			 while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
	?>
        <div class="col-lg-4 col-md-6 col-sm-4 card mb-5">
				<a href="{{url('/produk-detail/')}}/<?php echo @$row2['id']?>">
                <img src="{{ url('uploads') }}/<?php echo @$row2['gambar']?>" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h4 class="card-text-heading"><?php echo @$row2['nama_produk']?></h4>
                <p class="card-text"><?php echo @$row['nama_produk'] ?></p>
                <p class="card-text-price pb-0"><?php echo "Rp. ".number_format(@$row2['harga_produk'])?></p>
            </div>
        </div>
			 <?php }?>
    </div>
</div>
			<?php }?>
<center><a href="<?php echo url('produk-kategori')?>/semua" class="btn btn-lihat mb-5 mx-auto">Lihat Semua Events</a></center>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid" style="background-image: url('{{asset('assets')}}/images/home3.jpeg'); margin:0;">
    <div class="container background-fixed">
        <h1 class="display-4">Tanya, Cari Tahu <br >dan Daftar kan Eventmu</h1>
        <button type="button" class="btn btn-outline mt-2 mb-5">Hubungi Sekarang</button>
    </div> 
</div>

<div class="jumbotron jumbotron-fluid-home" style="margin:0; padding: 4rem 3rem; border-radius:0;">
  <div class="container">
    <h4 class="jumbotron-heading text-center">APE Membantu wujudkan Event yang kamu mau :</h4>
    <p class="jumbotron-text">01. Daftarkan Event Mu .</p>
    <p class="jumbotron-text">02. Urusan Peserta Serahkan pada APE</p>
  </div>
</div>


  
    
@endsection