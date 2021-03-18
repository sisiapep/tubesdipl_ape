<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="{{asset('assets')}}/images/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bentham&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ape-Sofa Collection </title>
  </head>
  <body>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top  navbar-rounded shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="img-fluid" src="{{asset('assets')}}/images/APE_LOGO.png" alt="" style="width:73px; "></a>
            <button class="navbar-toggler"  style="border:none;" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars fa-lg" style="color:#333;" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                <a class="nav-link active navlink-hover" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link active navlink-hover" href="<?php echo url('produk-kategori')?>/semua">List Event</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Kategori Event
                    </a>
					<?php
		$link = mysqli_connect("127.0.0.1", "root", "", "ape");
		$result = mysqli_query($link, "SELECT * FROM kategoris ORDER by id ASC");
			?>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php 
					while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
					{
					$kat = $row['id'];
					?>
                    <a class="dropdown-item" href="<?php echo url('produk-kategori')?>/<?php echo $kat?>"><?php echo $row['nama_kategori']?>	</a>
                    <?php }?>
                </li>
                <a class="nav-link navlink-hover" href="#">Kontak</a>
                <a class="nav-link navlink-hover" href="<?php echo url("/login")?>" style="font-weight: bold;">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    
    @yield('content')
    <footer class="mainfooter" role="contentinfo">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h5>APE</h5>
                            <ul class="list-unstyled">
                                <li><a href="#"></a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">List Event</a></li>
                                <li><a href="#">Daftar Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-pad col-md-5  col-sm-12">
                        <h5>Follow Us</h5>
                        <ul class="social-network social-circle">
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="instagram"><i class="fa fa-instagram"></i></a></li>
                        </ul>				
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <!--Column1-->
                        <div class="footer-pad">
                        <h5>Contact Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Jl. Telekomunikasi No.1, Bandung, Jawa Barat</a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i> 082111122223</a></li>
                            <li><a href="#">Email: admin@APE.com</a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copy mt-2 ">
                        <hr>
                        <p class="text-center">&copy; Copyright 2021 - SEMANGAT KAKA NPA.  All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    @yield('js')
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>