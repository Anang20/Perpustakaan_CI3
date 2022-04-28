<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<title>e-Pus </title>
<!--
Snapshot Template
http://www.templatemo.com/tm-493-snapshot

Zoom Slider
https://vegas.jaysalvat.com/

Caption Hover Effects
http://tympanus.net/codrops/2013/06/18/caption-hover-effects/
-->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/animate.min.css">
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/component.css">
	
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.theme.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/vegas.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">

	<!-- Google web font  -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body id="top" data-spy="scroll" data-offset="50" data-target=".navbar-collapse">


<!-- Preloader section -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>


<!-- Navigation section  -->

  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
          <span class="icon icon-bar"></span>
        </button>
        <a href="#top" class="navbar-brand smoothScroll">e-Pus</a>
      </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#top" class="smoothScroll"><span>Beranda</span></a></li>
            <li><a href="#about" class="smoothScroll"><span>Tentang</span></a></li>
            <li><a href="#gallery" class="smoothScroll"><span>Galeri</span></a></li>
          </ul>
       </div>

    </div>
  </div>


<!-- Home section -->

<section id="home">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">

      <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="wow fadeInUp" data-wow-delay="0.6s">e-Pus</h1>
        <p class="wow fadeInUp" data-wow-delay="0.9s">Semakin banyak Anda membaca, semakin banyak hal yang Anda ketahui. Semakin banyak yang Anda pelajari, semakin banyak ilmu yang Anda dapat.</p>
        <a href="<?= base_url('Login'); ?>" class="smoothScroll btn btn-success btn-lg wow fadeInUp" data-wow-delay="1.2s">Masuk</a>
      </div>

    </div>
  </div>
</section>


<!-- About section -->

<section id="about">
  <div class="container">
    <div class="row">

      <div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-delay="0.2s">
        <div class="about-thumb">
          <h1>Latar Belakang</h1>
          <p>Perpustakaan merupakan sumber/tempat untuk menemukan data. Perpustakaan tersebut membutuhkan Sistem Informasi yang dapat mengatur dan mengelola perpustakaan beserta data-data dengan baik. </p>
        </div>
      </div>

      <div class="col-md-3 col-sm-4 wow fadeInUp about-img" data-wow-delay="0.6s">
        <img src="<?= base_url('assets/'); ?>img/about-img.jpg" class="img-responsive img-circle" alt="About">
      </div>

      <div class="clearfix"></div>

      <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title text-center">
          <h1>e-Pus Team</h1>
          <h3>Fantastic Four</h3>
        </div>
      </div>

      <!-- team carousel -->
      <div id="team-carousel" class="owl-carousel">
        
        
        <div class="item col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.4s">
          <div class="team-thumb">
            <div class="image-holder">
              <img src="<?= base_url('assets/'); ?>img/team-img1.jpg" class="img-responsive img-circle" alt="Mary">
          </div>
          <h2 class="heading">Anang Syah Amirul Haqim</h2>
          <p class="description">Full Stack Developer</p>
        </div>
      </div>
      
      <div class="item col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="<?= base_url('assets/'); ?>img/team-img2.jpg" class="img-responsive img-circle" alt="Jack">
          </div>
          <h2 class="heading">Muhammad Zainuddin Basyar</h2>
          <p class="description">Full Stack Developer</p>
        </div>
      </div>
      
      <div class="item col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="<?= base_url('assets/'); ?>img/team-img3.jpg" class="img-responsive img-circle" alt="Linda">
          </div>
          <h2 class="heading">Muhammad Reza Nur Aditya</h2>
          <p class="description">Full Stack Developer</p>
        </div>
      </div>

      <div class="item col-md-3 col-sm-6 wow fadeInUp" data-wow-delay="0.8s">
        <div class="team-thumb">
          <div class="image-holder">
            <img src="<?= base_url('assets/'); ?>img/team-img4.jpg" class="img-responsive img-circle" alt="Sandy">
          </div>
          <h2 class="heading">Ariandita Hadi Nugroho</h2>
          <p class="description">Full Stack Developer</p>
        </div>
      </div>

      </div>
      <!-- end team carousel -->

    </div>
  </div>
</section>


<!-- Gallery section -->

<section id="gallery">
  <div class="container">
    <div class="row">

      <div class="col-md-offset-2 col-md-8 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="section-title">
          <h1>Galeri</h1>
          <p> Perpustakaan merupakan dunia dalam bentuk yang kecil,maka jelajahilah</p>
        </div>
      </div>

      <ul class="grid cs-style-4">
        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="<?= base_url('assets/'); ?>img/gallery-img1.jpg" alt="image 1"></div>
            <figcaption>
              <h1>Buku</h1>
              <small>Temukan buku yang anda cari</small>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="<?= base_url('assets/'); ?>img/gallery-img2.jpg" alt="image 2"></div>
            <figcaption>
              <h1>Genre</h1>
              <small>Temukan genre yang anda sukai</small>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="<?= base_url('assets/'); ?>img/gallery-img3.jpg" alt="image 3"></div>
            <figcaption>
              <h1>Trusted</h1>
              <small>Memberikan pelayanan yang terpercaya dan ramah</small>
            </figcaption>
          </figure>
        </li>

        <li class="col-md-6 col-sm-6">
          <figure>
            <div><img src="<?= base_url('assets/'); ?>img/gallery-img4.jpg" alt="image 4"></div>
            <figcaption>
              <h1>mudah</h1>
              <small>Memberikan pelayanan peminjaman yang mudah</small>
            </figcaption>
          </figure>
        </li>
      </ul>

    </div>
  </div>
</section>


<!-- Contact section -->

<section id="contact">
  <div class="container">
    <div class="row">

       <div class="col-md-offset-1 col-md-10 col-sm-12">

        <div class="col-lg-offset-1 col-lg-10 section-title wow fadeInUp" data-wow-delay="0.4s">
          <div class="footer-content">
            <div class="about">
              <h3 class="text-center">Tentang</h3>
              <h3>- Telp : 085156970093</h3>
              <h3>- WA : 085156970093</h3>
            </div>
            <div class="information">
              <h3 class="text-center">Infomasi</h3>
              <h3>Jam Buka : 07.00 - 16.00</h3>
            </div>
            <div class="instagram">
              <h3 class="text-center">Sponsor</h3>  
              <h3>- Hub : 085156970093</h3>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>


<!-- Footer section -->

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp"  data-wow-delay="1s" >Copyright &copy; Fantastic Four</a></p>
			</div>
		</div>
	</div>
</footer>

<!-- Back top -->
<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

<!-- Javascript  -->
<script src="<?= base_url('assets/');?>js/jquery.js"></script>
<script src="<?= base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/');?>js/vegas.min.js"></script>
<script src="<?= base_url('assets/');?>js/modernizr.custom.js"></script>
<script src="<?= base_url('assets/');?>js/toucheffects.js"></script>
<script src="<?= base_url('assets/');?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/');?>js/smoothscroll.js"></script>
<script src="<?= base_url('assets/');?>js/wow.min.js"></script>
<script src="<?= base_url('assets/');?>js/custom.js"></script>

</body>
</html>