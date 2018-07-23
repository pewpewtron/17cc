@extends('layout.template')

@section('title')
ITCC 2018
@endsection

@section('head')
{{-- <!-- Template Timeline -->
<link rel="stylesheet" href="{{asset('asset1/timeline/css/reset.css')}}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{asset('asset1/timeline/css/style.css')}}"> <!-- Resource style -->
<script src="{{asset('asset1/timeline/js/modernizr.js')}}"></script> <!-- Modernizr -->
<!--script src="{{asset('asset1/timeline/js/jquery-2.1.4.js')}}"></script>
<script src="{{asset('asset1/timeline/js/jquery.mobile.custom.min.js')}}"></script-->
<script src="{{asset('asset1/timeline/js/main.js')}}"></script> <!-- Resource jQuery --> --}}
@endsection

@section('navbar')
<li><a href="#hero">Beranda</a></li>
{{-- <li><a href="#profile">Profil</a></li> --}}
<li><a href="#lomba">Lomba</a></li>
<li><a href="#informasi">Informasi</a></li>
<li><a href="#jadwal">Jadwal</a></li>
<li><a href="#contact">Kontak</a></li>
<li class="menu-has-children"><a href="#">Pendaftaran</a>
  	<ul>
    	<li><a href="/daftar/pemrograman">Lomba Pemrograman</a></li>
    	<li><a href="/daftar/desainweb">Lomba Desan Web</a></li>
    	<li><a href="/daftar/cerdascermat">Lomba Cerdas Cermat</a></li>
    	<li><a href="/daftar/android">Lomba Pengembangan Aplikasi Android</a></li>
    	<li><a href="/daftar/idebisnis">Lomba Pengembangan Ide Bisnis TIK</a></li>
  	</ul>
</li>
{{--<li><a href="/login">Masuk</a></li>--}}
<li><a href="/faq">FAQ</a></li>
@endsection

@section('intro')
<!--==========================
    Hero Section
============================-->
<section id="hero">
    <div class="container">

      	<div class="row" style="padding-top: 170px;">
        	<div class="col-lg-8 wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="500ms">
          		<h1>Powering Smart Society with Information Technology</h1>
              
          		<p>Information Technology Creative Competition (ITCC) adalah kompetisi bidang Teknologi Informasi yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HMTI) Universitas Udayana. ITCC 2018 hadir dengan lima cabang lomba yang bertujuan untuk menumbuhkan kreativitas dalam diri peserta khususnya yang berkaitan dengan bidang Teknologi Informasi dan Komunikasi dalam menciptakan inovasi baru untuk memecahkan permasalahan yang ada di masyarakat.<br>#YesWeCan </p>
        	</div>
        	<div id="logo" class="col-lg-4 wow fadeInUp hide-sm" data-wow-duration="1500ms" data-wow-delay="500ms">
          		<img src="{{asset('asset1/images/logo_350w.png')}}" style="width: 100%; margin-top: 50px;">
        	</div>
      	</div>

    </div>
</section><!-- #hero -->
@endsection

@section('content')
<!--==========================
      About Us Section
============================-->
{{-- <section id="profile">
    <div class="container">

    	<div class="row wow fadeInUp">

          	<div class="col-lg-6">
            	<div class="video-container" >
              		<div onclick="thevid=document.getElementById('thevideo'); thevid.style.display='block'; this.style.display='none'">
                 		<img class="img-responsive" src="{{asset('asset1/images/imgvid3.jpg')}}" style="margin:0 0 0 0;cursor:pointer; width: 100%">
              		</div>
              		<div id="thevideo" style="display:none;">
                 		iframe width="560" height="315" src="https://www.youtube.com/embed/NU9h19h574Q" frameborder="0" allowfullscreen></iframe
              		</div>
            	</div>
          	</div>

          	<div class="col-lg-6">
            	<h1>ITCC 2018</h1>
            	<p class="justify">Information Technology Creative Competition (ITCC) 2018 merupakan penyelenggaran ketujuh dari Himpunan Mahasiswa Teknologi Informasi, Fakultas Teknik, Universitas Udayana. ITCC 2018 mengambil tema</p>
            	<h2>"Powering Smart Society with Information Technology"</h2>
            	<p class="justify">penjelasan tema</p>
          	</div>

    	</div>

    </div>
</section><!-- #about --> --}}

<!--==========================
      Lomba Section
============================-->
<section id="lomba">
    <div class="container">

        <header class="section-header">
          	<h3>Kategori Lomba</h3>
        </header>

        <div class="row about-cols">

          	<div class="col-md-4 wow fadeInUp">
            	<div class="about-col">
             		<div class="img">
                		<img src="{{asset('asset1/LPJ/prog.jpg')}}">
                		<div class="icon"><img src="{{asset('asset1/images/logo_prog_100.png')}}"></div>
              		</div>
              		<h2>Pemrograman</h2>
              		<p>
                		Cabang Lomba <b>Pemrograman</b> diperuntukan kepada siswa SMA/SMK/Sederajat se-Bali. Biaya Pendaftaran  mulai Rp. 75.000,- dengan total hadiah sebesar Rp. 4.950.000,-
              		</p>
              		<center><a href="/landing/pemrograman" class="btn-get-started">Selengkapnya</a></center>
            	</div>
          	</div>

          	<div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            	<div class="about-col">
              		<div class="img">
                		<img src="{{asset('asset1/LPJ/web.jpg')}}">
                		<div class="icon"><img src="{{asset('asset1/images/logo_web_100.png')}}"></div>
              		</div>
              		<h2>Desain Web</h2>
              		<p>
                		Cabang Lomba <b>Desain Web</b> diperuntukan kepada siswa SMA/SMK Sederajat se-Bali. Biaya Pendaftaran  mulai Rp. 75.000,- dengan total hadiah sebesar Rp. 4.950.000,-
              		</p>
              		<center><a href="/landing/desainWeb" class="btn-get-started">Selengkapnya</a></center>
            	</div>
          	</div>

          	<div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            	<div class="about-col">
              		<div class="img">
                		<img src="{{asset('asset1/LPJ/lcc.jpg')}}">
                	<div class="icon"><img src="{{asset('asset1/images/logo_lcc_100.png')}}"></div>
              		</div>
              		<h2>Cerdas Cermat</h2>
              		<p>
                		Cabang Lomba <b>Cerdas Cermat</b> diperuntukan kepada siswa SMA/SMK Sederajat se-Bali. Biaya Pendaftaran mulai Rp. 140.000,- dengan total hadiah sebesar Rp. 4.950.000,-
              		</p>
              		<center><a href="/landing/cerdasCermat" class="btn-get-started">Selengkapnya</a></center>
            	</div>
          	</div>

        </div>

        <div class="row about-cols">

          	<div class="col-md-6 wow fadeInUp">
            	<div class="about-col">
              		<div class="img">
                		<img src="{{asset('asset1/LPJ/andro.jpg')}}">
                		<div class="icon"><img src="{{asset('asset1/images/logo_andr_100.png')}}"></div>
              		</div>
              		<h2>Pengembangan Aplikasi Android</h2>
              		<p>
                		Cabang Lomba <b>Pengembangan Aplikasi Android</b> diperuntukan kepada mahasiswa maksimal jenjang S1 seluruh Universitas di Indonesia. Biaya Pendaftaran adalah Rp. 150.000,- dengan total hadiah sebesar Rp. 9.380.000,-
              		</p>
              		<center><a href="/landing/pengembangan-aplikasi-android" class="btn-get-started">Selengkapnya</a></center>
            	</div>
          	</div>

          	<div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            	<div class="about-col">
              		<div class="img">
                		<img src="{{asset('asset1/LPJ/idea.jpg')}}">
                		<div class="icon"><img src="{{asset('asset1/images/logo_idea_100.png')}}"></div>
              		</div>
              		<h2>Pengembangan Ide Bisnis TIK</h2>
              		<p style="padding-bottom: 44px;">
                		Cabang Lomba <b>Pengembangan Ide Bisnis TIK</b> diperuntukan kepada kalangan Umum (maksismal 24 tahun) seluruh Indonesia. Biaya Pendaftaran Rp. 150.000,- dengan total hadiah sebesar Rp. 9.380.000,-
              		</p>
              		<center><a href="/landing/ideBisnis" class="btn-get-started">Selengkapnya</a></center>
            	</div>
          </div>
          
        </div>


    </div>
    
</section><!-- #lomba -->

<!--==========================
    Call To Action Section
============================-->
{{-- <section id="call-to-action">
    <div class="container wow fadeIn">
        <div class="row">

          	<div class="col-lg-12 text-center">
            	<h3 class="cta-title">ITCC 2018</h3>
            	<h4 class="cta-text">"Tema"</h4>
          	</div>

        </div>
    </div>
</section><!-- #call-to-action -->
 --}}
<!--==========================
      Informasi
============================-->
<section id="informasi">
    <div class="container wow fadeInUp">

        <div class="section-header">
          	<h3 class="section-title">Informasi ITCC 2018</h3>
        </div>

        <div class="row" style="padding-top: 60px;">
{{-- 
          	<div class="col-lg-4">
            	<h3>Icon ITCC</h3>
            	<h4>Comming Soon</h4>
          	</div>
 --}}
          	<div class="col-sm-12 about-itcc">
              	<div class="head-news" style="background-color: #202a2d;padding: 15px;">
                	<h2 style="color: #fafafa; text-align: center; margin: 0px;"> Informasi Terbaru <b>ITCC 2018</b></h2>
             	</div>
              	<div class="body-news" style="border-style: solid; border-color: #202a2d;">
                	<ul style="padding-right: 40px;">
                  		<li>
                  			<h3 style="margin: 0px;color: #0575e6;  margin-top: 10px;">Informasi Pendaftaran ITCC 2018</h3>
                        <span class="fa fa-clock-o" style="font-size: 12px;"> 8 Juli 2018</span> 
                        	<p style="color: #202a2d; text-align: justify;">
                           Pendaftaran ITCC 2018 akan dibuka pada tanggal 1 Agustus 2018 untuk semua cabang lomba. Cabang Lomba Kategori SMA/SMK/Sederajat dibuka dalam dua gelombang yaitu Gelombang I mulai tanggal 1 Agustus 2018 sampai 31 Agustus 2018 dan Gelombang II mulai tanggal 1 September 2018 sampai 30 September 2018. Cabang Lomba Kategori Mahasiswa/Umum dibuka hanya satu gelombang mulai tanggal 1 Agustus 2018 sampai 31 September 2018.<br><br>
                           <b>Guide Book</b> masing-masing cabang lomba dapat diunduh pada tautan dibawah ini.<br>
                           <a href="/guidebook/GUIDEBOOK_LCC_ITCC_2018_v1.0.pdf">Cabang Lomba Cerdas Cermat</a><br>
                           <a href="/guidebook/GUIDEBOOK_DESAIN_WEB_ITCC_2018_v1.0.pdf">Cabang Lomba Desain Web</a><br>
                           <a href="/guidebook/GUIDEBOOK_PEMROGRAMAN_ITCC_2018_v1.0.pdf">Cabang Lomba Pemrograman</a><br>
                           <a href="/guidebook/GUIDEBOOK_IDEA_ITCC_2018_v1.0.pdf">Cabang Lomba Pengembangan Ide Bisnis TIK</a><br>
                           <a href="/guidebook/GUIDEBOOK_ANDROID_ITCC_2018_v1.0.pdf">Cabang Lomba Pengembangan Aplikasi Android</a><br>
                          </p>
                  		</li>
                  		{{-- <hr style="background-color:#202a2d; "> --}}
                  		
                	</ul>
             	 </div>
            </div>
          
        </div>
        
    </div>
</section><!-- #informasi -->

<!--==========================
      Jadwal
============================-->
{{-- <section id="jadwal" class="cd-horizontal-timeline wow fadeInUp" style="background-color: #fff; padding-top: 40px; padding-bottom: 60px; margin-top: 0px;">
    <div class="section-header">
          <h3 class="section-title">Jadwal ITCC 2018</h3>
    </div>

  	<div class="timeline" style="margin-top: 50px;">
    	<div class="events-wrapper">
	      	<div class="events">
	        	<ol>
	          		<li><a href="#0" data-date="01/08/2018" class="selected">1 Agust</a></li>
                <li><a href="#0" data-date="31/08/2018">31 Agust</a></li>
                <li><a href="#0" data-date="01/09/2018">1 Sept</a></li>
	          		<li><a href="#0" data-date="19/09/2018">19 Sept</a></li>
                <li><a href="#0" data-date="26/09/2018">26 Sept</a></li>
                <li><a href="#0" data-date="27/09/2018">27 Sept</a></li>
                <li><a href="#0" data-date="30/09/2018">30 Sept</a></li>
                <li><a href="#0" data-date="11/10/2018">11 Okt</a></li>
                <li><a href="#0" data-date="12/10/2018">12 Okt</a></li>
                <li><a href="#0" data-date="19/10/2018">19 Okt</a></li>
                <li><a href="#0" data-date="23/10/2018">23 Okt</a></li>
                <li><a href="#0" data-date="28/10/2018">28 Okt</a></li>
                <li><a href="#0" data-date="30/10/2018">30 Okt</a></li>
                <li><a href="#0" data-date="01/11/2018">1 Nov</a></li>
                <li><a href="#0" data-date="02/11/2018">2 Nov</a></li>
	        	</ol>

	        	<span class="filling-line" aria-hidden="true"></span>
	      	</div> <!-- .events -->
    	</div> <!-- .events-wrapper -->
      
    	<ul class="cd-timeline-navigation">
      		<li><a href="#0" class="prev inactive">Prev</a></li>
      		<li><a href="#0" class="next">Next</a></li>
    	</ul> <!-- .cd-timeline-navigation -->
  	</div> <!-- .timeline -->

  	<div class="events-content">
    	<ol>
      	<li class="selected" data-date="01/08/2018">
        	<center>
		        <h2 style="color: #000; font-size: 30px;">Pembukaan Pendaftaran</h2>
		        <p style="font-size: 15px;"> 
		            <span class="badge badge-info">Desain Web</span>
                <span class="badge badge-info">Cerdas Cermat</span>
                <span class="badge badge-info">Pemrograman</span>
                <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                <span class="badge badge-info">Pengembangan Aplikasi Android</span>
		        </p>
            <p> 
              Pembukaan pendaftaran gelombang 1 untuk cabang lomba kategori SMA/SMK dan Pembukaan pendaftaran untuk cabang lomba kategori Mahasiswa/Umum.
            </p>
        	</center>
      	</li>

        <li data-date="31/08/2018">
          <center>
            <h2 style="color: #000; font-size: 30px;">Penutupan Pendaftaran</h2>
            <p style="font-size: 15px;"> 
                <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                <span class="badge badge-info">Desain Web</span>
                <span class="badge badge-info">Cerdas Cermat</span>
                <span class="badge badge-info">Pemrograman</span>
            </p>
            <p>
              Penutupan pendaftaran lomba kategori Perguruan Tinggi dan Umum se-Indonesia<br>Penutupan pendaftaran gelombang 1 lomba kategori SMA/SMK/Sederajat se-Bali
            </p>
          </center>
        </li>

        <li data-date="01/09/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Pembukaan Pendaftaran Gelombang 2 SMA/SMK</h2>
                <p style="font-size: 15px;">
                  <span class="badge badge-info">Desain Web</span>
                  <span class="badge badge-info">Cerdas Cermat</span>
                  <span class="badge badge-info">Pemrograman</span>
                </p>
            </center>
        </li>

		    <li data-date="19/09/2018">
		    	<center>
		          	<h2 style="color: #000; font-size: 30px;">Batas Akhir Pengumpulan Submisi Tahap 1 Cabang Lomba Kategori Perguruan Tinggi dan Umum</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
		        </center>
		    </li>

        <li data-date="26/09/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Pengumuman Hasil Submisi Tahap 1 Cabang Lomba Kategori Perguruan Tinggi dan Umum</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
            </center>
        </li>

        <li data-date="27/09/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Pembukaan Submisi Tahap 2 Cabang Lomba Kategori Perguruan Tinggi dan Umum</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
            </center>
        </li>

        <li data-date="30/09/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Penutupan Pendaftaran Gelombang 2</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
            </center>
        </li>

        <li data-date="11/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Batas Akhir Pengumpulan Submisi Tahap 2 Cabang Lomba Kategori Perguruan Tinggi dan Umum</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
            </center>
        </li>

        <li data-date="12/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Warming Up Hari Pertama</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pemrograman</span>
                </p>
            </center>
        </li>

        <li data-date="19/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Warming Up Hari Terakhir</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pemrograman</span>
                </p>
            </center>
        </li>

        <li data-date="23/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Pengumpulan Finalis</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
            </center>
        </li>

        <li data-date="28/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Technical Meeting</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
                <p>
                  Pelaksanaan <i>Technical Meeting</i> bagi cabang lomba tingkat SMA/SMK/Sederajat se-Bali
                </p>
            </center>
        </li>

        <li data-date="30/10/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Technical Meeting</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p>
                  Pelaksanaan <i>Technical Meeting</i> bagi cabang lomba kategori Perguruan Tinggi dan Umum se-Indonesia
                </p>
            </center>
        </li>

        <li data-date="01/11/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Hari H Pertama ITCC 2018</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
                <p>
                  Babak final cabang lomba kategori Perguruan Tinggi dan Umum se-Indonesia<br>
                  Babak penyisihan bagi cabang lomba <b>Pemrograman</b> dan <b>Desain Web</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Babak penyisihan serta semifinal 1 dan 2 bagi cabang lomba <b>Cerdas Cermat</b> kategori SMA/SMK/Sederajat se-Bali
                </p>
            </center>
        </li>

        <li data-date="02/11/2018">
          <center>
                <h2 style="color: #000; font-size: 30px;">Hari H Kedua ITCC 2018</h2>
                <p style="font-size: 15px;">
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
                <p>
                  Expo cabang lomba kategori Perguruan Tinggi dan Umum se-Indonesia<br>
                  Babak final bagi cabang lomba <b>Pemrograman</b> dan <b>Desain Web</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Babak semifinal 3 dan 4 serta final bagi cabang lomba <b>Cerdas Cermat</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Penyerahan hadiah bagi cabang lomba kategori SMA/SMK/Sederajat serta Perguruan Tinggi dan Umum
                </p>
            </center>
        </li>
	      	
    	</ol>
  	</div> <!-- .events-content -->
</section> --}}

<!--==========================
      Contact Section
============================-->
<section id="contact">
    <div class="container wow fadeInUp" style="padding-bottom: 60px;">
        <div class="section-header">
          	<h3 class="section-title">Kontak</h3>
        </div>
    </div>

    <div class="container wow fadeInUp">

        <div class="row" style="margin-bottom: 20px;">

	        <div class="col-sm-12 col-md-4 twitter">
	            <h3><b>Twitter</b> Feed</h3>
	            <a class="twitter-timeline" data-width="360" data-height="500" data-theme="light" data-link-color="#021b79" href="https://twitter.com/ITCCUdayana" style="color: #0575e6;">Tweets by ITCCUdayana</a>
	        </div>

          	<div class="col-sm-12 col-md-4 facebook">
            	<h3><b>Facebook</b> Feed</h3>
            	<div class="fb-page" data-href="https://www.facebook.com/ITCC.Udayana/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ITCC.Udayana/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ITCC.Udayana/" style="color: #0575e6;">ITCC Udayana</a></blockquote></div>
                 
          	</div>

          	<div class="col-sm-12 col-md-4">

            	<h3>Hubungi Kami</h3>
           	 	<hr>
            	<p>Teknologi Informasi Jimbaran <br>
            	Gedung Teknologi Informasi-Fakultas Teknik, <br>
            	Jalan Raya Kampus UNUD, Jimbaran, Badung, Bali</p>
            	<hr>
            	<p>
                Trio Putra (Ketua)<br>
                081999101806 / trioputrap<br>
              </p>
              <p>
                Toby (Hubungan Masyarakat)<br>
                085738134728 / tobysp<br>
              </p>
              <p><a href="https://www.facebook.com/ITCC.Udayana" target="_blank"><img style="width: 30px;" src="{{asset('asset1/images/facebook.png')}}"></a><a href="https://twitter.com/itcc_udayana" target="_blank"><img style="width: 30px;" src="{{asset('asset1/images/twitter.png')}}"></a><a href="https://www.instagram.com/itcc_udayana/" target="_blank"><img style="width: 30px;" src="{{asset('asset1/images/instagram.png')}}"></a><a href="https://ask.fm/itcc_udayana" target="_blank"><img style="width: 30px;" src="{{asset('asset1/images/Askfm.png')}}"></a><a href="https://bit.ly/ITCCUdayana" target="_blank"><img style="width: 30px;" src="{{asset('asset1/images/line.png')}}"></a></p>
                    
          	</div>

        </div>

    </div>
</section><!-- #contact -->

<section id="google-map" data-latitude="-8.796310" data-longitude="115.176455"></section>
@endsection