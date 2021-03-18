
@extends('layout.layout')
@section('content')
<?php
		$link = mysqli_connect("127.0.0.1", "root", "", "ape");
		$a = session('kategori');
		$result5 = mysqli_query($link, "SELECT * FROM kategoris where id = '$a' ORDER by id ASC");
		if ($a == "semua"){
		$nama = "Semua Kategori";
		}
		else {
		while ($row5 = mysqli_fetch_array($result5,MYSQLI_ASSOC))
					{
							$nama = $row5['nama_kategori'];
					}
		}
?>
<div class="jumbotron jumbotron-kategori" style="background-image: url('{{asset('assets')}}/images/gambar3.jpg'); margin-bottom:1;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $nama?></li>
        </ol>
    </nav>
    <h1 class="col display-4" style="color:white; font-weight:600;"><?php echo $nama?></h1>
</div>
<!--Kategori-->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-none d-sm-block" >
  <button class="navbar-toggler"  type="button" data-toggle="collapse" data-target="#menu-kategori" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse" id="menu-kategori">
    <div class="navbar-nav m-auto">
	<?php
	
		$result = mysqli_query($link, "SELECT * FROM kategoris ORDER by id ASC");
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
						$kat = $row['id'];
	?>
      <a class="nav-link menu-kategori" href="<?php echo url('produk-kategori')?>/<?php echo $kat?>"><?php echo $row['nama_kategori']?></a>
					<?php }?>
      <a class="menu-kategori nav-link" href="<?php echo url('produk-kategori')?>/semua">Semua Kategori</a>
    </div>
  </div>
</nav>
<!--End Kategori-->
<hr>
<div class="container mt-3">
    <div class="row">
		
		<?php
		$result2="";
		$kem=session('kategori');
		if (session('kategori')=="semua"){
			
			$result2 = mysqli_query($link, "SELECT * FROM produks order by id DESC");
		}
		else {
			$result2 = mysqli_query($link, "SELECT * FROM produks where id_kategori = '$kem' order by id DESC");
		}
		while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC))
			{
			$kat2 = $row2['id_kategori'];
		?>
        <div class="col-lg-3 col-md-6 col-sm-4 card mb-5">
                <a href="{{url('/produk-detail/')}}/<?php echo @$row2['id']?>">
				<img src="{{ url('uploads') }}/<?php echo $row2['gambar'] ?>" class="card-img-top" alt="...">
				</a>
            <div class="card-body">
                <h4 class="card-text-heading"><?php echo $row2['nama_produk']?></h4>
                <p class="card-text">
			<?php $result3 = mysqli_query($link,"SELECT * FROM kategoris where id = '$kat2'");
					
				while ($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){
					echo $row3['nama_kategori'];
				}
			?>
				</p>
                <p class="card-text-price pb-0"><?php echo "Rp. ".number_format($row2['harga_produk']) ?></p>
            </div>
		</div>
			<?php }?>
</div>
@endsection
