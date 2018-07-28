@extends('layout.template')

@section('title')
Cerdas Cermat - ITCC 2018
@endsection

@section('head')
{{-- <!-- Template Timeline -->
<link rel="stylesheet" href="{{asset('asset1/timeline/css/reset.css')}}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{asset('asset1/timeline/css/style.css')}}"> <!-- Resource style -->
<script src="{{asset('asset1/timeline/js/modernizr.js')}}"></script> <!-- Modernizr -->
<script src="{{asset('asset1/timeline/js/jquery-2.1.4.js')}}"></script>
<script src="{{asset('asset1/timeline/js/jquery.mobile.custom.min.j')}}s"></script>
<script src="{{asset('asset1/timeline/js/main.js')}}"></script> <!-- Resource jQuery --> --}}

<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endsection

@section('navbar')
<li><a href="/">Beranda</a></li>
<li><a href="#jadwal">Jadwal</a></li>
<li><a href="#contact">Kontak</a></li>
{{--<li><a href="/login">Masuk</a></li>--}}
<li><a href="/faq">FAQ</a></li>
@endsection

@section('intro')
<!--==========================
      Intro Section
============================-->
<section id="hero">
    <div class="hero-container wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      	<h1>Cabang Lomba Cerdas Cermat</h1>
      	<h2>Cerdas, Cepat, Tepat</h2>
      	<div class="actions">
      		<a href="#profile" class="btn-detail">Selengkapnya</a>
      		{{-- <a href="/daftar/cerdascermat" class="btn-daftar">Yuk Daftar!</a> --}}
      	</div>
    </div>
</section><!-- #hero -->

<!--==========================
      Profile Section
============================-->
<section id="profile">
  	<div class="container wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms" style="margin-top: 50px; margin-bottom: 50px;">
  		
  		<header class="section-header">
  			<h3>Deskripsi</h3>
  		</header>

  		<center>
	  		<div class="row col-md-9" style="margin-top: 40px;">
	  			<p style="font-size: 16px;">Cabang Cerdas Cermat merupakan salah satu perlombaan yang ada dalam kegiatan ITCC 2018 yang dikhususkan untuk pelajar tingkat SMA/SMK sederajat Se-Bali.<br>Cabang lomba desain web bertujuan untuk menjaring siswa/siswi SMA, SMK ataupun jenjang yang sederajat seluruh Bali yang memiliki kompetensi dalam bidang Ilmu Teknologi Informasi.<br>Cabang desain web merupakan jenis perlombaan bertim, dimana setiap tim terdiri dari 3 orang dengan biaya pendaftaran mulai Rp. 140.000,- untuk setiap tim.</p>
	  		</div>
	  		<a href="/guidebook/GUIDEBOOK_LCC_ITCC_2018_v1.0.pdf" class="btn-get-started">Download Guide Book</a>
  		</center>

  	</div>
</section>

<!--==========================
      Hadiah Section
============================-->
<section id="hadiah">
    <div class="container">
      
      	<header class="section-header">
        	<h3>Hadiah</h3>
      	</header>

      	<div class="row about-cols" style="margin-top: 40px;">

        	<div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
		         <div class="about-col">
		            <div class="img">
		              	<img src="{{asset('asset1/images/logo_350w.png')}}">
		              	<div class="icon"><img src="{{asset('asset1/images/logo_lcc_100.png')}}"></div>
		            </div>
		            <h2>Juara 1<br>Rp. 1.000.000,-</h2>
		            <h2 style="margin-top: 15px; ">Hadiah</h2>
		            <center>
		              	<p>
		                	Hosting Dewaweb (Guardian) senilai Rp. 1.440.000, Sertifikat, Plakat, dan hadiah menarik lainnya
		              	</p>
		            </center>
		         </div>
        	</div>

        	<div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
		        <div class="about-col">
		            <div class="img">
		              	<img src="{{asset('asset1/images/logo_350w.png')}}">
		              	<div class="icon"><img src="{{asset('asset1/images/logo_lcc_100.png')}}"></div>
		            </div>
		            <h2>Juara 2<br>Rp. 750.000,-</h2>
		            <h2 style="margin-top: 15px; ">Hadiah</h2>
		            <center>
		              	<p style="padding-bottom: 44px;">
		                	Hosting Dewaweb (Warrior) senilai Rp. 900.000, Sertifikat, Plakat, dan hadiah menarik lainnya
		              	</p>
		            </center>
		        </div>
        	</div>

        	<div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
		        <div class="about-col">
		            <div class="img">
		              	<img src="{{asset('asset1/images/logo_350w.png')}}">
		              	<div class="icon"><img src="{{asset('asset1/images/logo_lcc_100.png')}}"></div>
		            </div>
		            <h2>Juara 3<br>Rp. 500.000,-</h2>
		            <h2 style="margin-top: 15px; ">Hadiah</h2>
		            <center>
		              	<p style="padding-bottom: 44px;">
		                	Hosting Dewaweb (Hunter) senilai Rp. 360.000, Sertifikat, Plakat, dan hadiah menarik lainnya
		              	</p>
		            </center>
		        </div>
        	</div>
        
      	</div>

    </div>
</section>

<!--==========================
      Jadwal Section
============================-->
<section id="jadwal" class="wow fadeIn">
	<div class="demo">
		<div class="container">
			
			<div class="section-header">
				<h3 class="section-title">jadwal</h3>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-timeline">
						
						<div class="timeline wow fadeInLeft">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">1<sup>st</sup></span>
    								<span class="month">Agust</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Pembukaan Pendaftaran</h2>
    							<p class="description text-center">Pembukaan pendaftaran gelombang 1</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInRight">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">31<sup>st</sup></span>
    								<span class="month">Agust</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Penutupan Pendaftaran</h2>
    							<p class="description text-center">Penutupan pendaftaran gelombang 1</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInLeft">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">1<sup>st</sup></span>
    								<span class="month">Sept</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Pembukaan Pendaftaran</h2>
    							<p class="description text-center">Pembukaan pendaftaran gelombang 2</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInRight">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">30<sup>th</sup></span>
    								<span class="month">Sept</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Penutupan Pendaftaran</h2>
    							<p class="description text-center">Penutupan pendaftaran gelombang 2</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInLeft">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">28<sup>th</sup></span>
    								<span class="month">Okt</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Technical Meeting</h2>
    							<p class="description text-center">Pelaksanaan technical meeting</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInRight">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">1<sup>st</sup></span>
    								<span class="month">Nov</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Hari Pertama ITCC 2018</h2>
    							<p class="description text-center">Babak Penyisihan serta Semifinal 1 dan 2</p>
    						</div>
    					</div>

    					<div class="timeline wow fadeInLeft">
    						<div class="timeline-content">
    							<span class="date">
    								<span class="day">2<sup>nd</sup></span>
    								<span class="month">Nov</span>
    								<span class="year">2018</span>
    							</span>
    							<h2 class="title">Hari Kedua ITCC 2018</h2>
    							<p class="description text-center">Babak Semifinal 3 dan 4 serta Final<br>Penyerahan Hadiah</p>
    						</div>
    					</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</section>
{{--<section id="jadwal" class="cd-horizontal-timeline wow fadeInUp" style="background-color: #f7f7f7; padding-top: 80px; padding-bottom: 60px;">
    <div class="section-header">
          <h3 class="section-title">Jadwal</h3>
    </div>

  	<div class="timeline" style="margin-top: 50px;">
    	<div class="events-wrapper">
		    <div class="events">
		        <ol>
		          	<li><a href="#0" data-date="01/08/2018" class="selected">1 Agust</a></li>
                	<li><a href="#0" data-date="31/08/2018">31 Agust</a></li>
                	<li><a href="#0" data-date="01/09/2018">1 Sept</a></li>
                	<li><a href="#0" data-date="30/09/2018">30 Sept</a></li>
                	<li><a href="#0" data-date="28/10/2018">28 Okt</a></li>
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
		          	<em>1 Agustus 2018</em>
		          	<h2 style="color: #000; font-size: 30px;">Pembukaan Pendaftaran Gelombang 1</h2>
		        </center>
		    </li>

		    <li data-date="31/08/2018">
		        <center>
		          	<em>31 Agustus 2018</em>
		          	<h2 style="color: #000; font-size: 30px;">Penutupan Pendaftaran Gelombang 1</h2>
		        </center>
		    </li>

		    <li data-date="01/09/2018">
		        <center>
		          	<em>1 September 2018</em>
		          	<h2 style="color: #000; font-size: 30px;" class="text-black">Pembukaan Pendaftaran Gelombang 2</h2>
		        </center>
		    </li>

		    <li data-date="30/09/2018">
		        <center>
		          	<em>30 September 2018</em>
		          	<h2 style="color: #000; font-size: 30px;"class="text-black">Penutupan Pendaftaran Gelombang 2</h2>
		        </center>
		    </li>
		    <li data-date="28/10/2018">
		        <center>
		          	<em>28 Oktober 2018</em>
		          	<h2 style="color: #000; font-size: 30px;"class="text-black">Technical Meeting</h2>
		        </center>
		    </li>
		    <li data-date="01/11/2018">
		        <center>
		          	<em>1 November 2018</em>
		          	<h2 style="color: #000; font-size: 30px;"class="text-black">Babak Penyisihan serta Semifinal 1 dan 2</h2>
		        </center>
		    </li>
		    <li data-date="02/11/2018">
		        <center>
		          	<em>2 November 2018</em>
		          	<h2 style="color: #000; font-size: 30px;"class="text-black">Babak Semifinal 3 dan 4 serta Final</h>
		        </center>
		    </li>
    	</ol>
  	</div> <!-- .events-content -->
</section>--}}

<!--==========================
      Lomba Lain Section
============================-->
<section id="lomba-lainnya" style="background-color: #fff;">
  	<div class="container">
    
    	<div class="row" style="margin-top: 50px;">

		    <div class="col-lg-6">
		        <div class="box wow fadeInLeft">
		        	<div class="row">
			          	<div class="icon col-sm-3">
			          		<img src="{{asset('asset1/images/logo_prog_100.png')}}" style="padding-right: 20px;">
			          	</div>
			          	<div class="col-sm-9">
				          	<h4 class="title">Pemrograman</h4>
				          	<p class="description justify">Cabang Lomba <b>Pemrograman</b> diperuntukan kepada siswa SMA/SMK Sederajat se-Bali. Biaya Pendaftaran mulai Rp. 75.000,-</p>
				          	<a href="/landing/pemrograman" class="btn-get-started">Selengkapnya</a>	
			          	</div>
		        	</div>
		        </div>
		    </div>

		    <div class="col-lg-6">
		        <div class="box wow fadeInRight">
		          	<div class="row">
			          	<div class="icon col-sm-3">
			          		<img src="{{asset('asset1/images/logo_web_100.png')}}" style="padding-right: 20px;">
			          	</div>
			          	<div class="col-sm-9">
				          	<h4 class="">Desain Web</h4>
				          	<p class="justify">Cabang Lomba <b>Desain Web</b> diperuntukan kepada siswa SMA/SMK Sederajat se-Bali. Biaya Pendaftaran mulai Rp. 75.000,-</p>
				          	<a href="/landing/desainWeb" class="btn-get-started">Selengkapnya</a>
			          	</div>
		        	</div>
		        </div>
		    </div>

    	</div>

    	<div class="row">

		    <div class="col-lg-6">
		        <div class="box wow fadeInLeft">
		          	<div class="row">
			          	<div class="icon col-sm-3">
			          		<img src="{{asset('asset1/images/logo_andr_100.png')}}" style="padding-right: 20px;">
			          	</div>
			          	<div class="col-sm-9">
				          	<h4 class="">Pengembangan Aplikasi Android</h4>
				          	<p class="justify">Cabang Lomba <b>Pengembangan Aplikasi Android</b> diperuntukan kepada mahasiswa maksimal jenjang S1 seluruh Indonesia. Biaya Pendaftaran Rp. 150.000,-</p>
				          	<a href="/landing/pengembangan-aplikasi-android" class="btn-get-started">Selengkapnya</a>
			          	</div>
		        	</div>
		        </div>
		    </div>

		    <div class="col-lg-6">
		        <div class="box wow fadeInRight">
		          	<div class="row">
			          	<div class="icon col-sm-3">
			          		<img src="{{asset('asset1/images/logo_idea_100.png')}}" style="padding-right: 20px;">
			          	</div>
			          	<div class="col-sm-9">
				          	<h4 class="title">Pengembangan Ide Bisnis TIK</h4>
				          	<p class="description justify">Cabang Lomba <b>Pengembangan Ide Bisnis TIK</b> diperuntukan kepada kalangan Umum (maksismal 24 tahun) seluruh Indonesia. Biaya Pendaftaran Rp. 150.000,-</p>
				          	<a href="/landing/ideBisnis" class="btn-get-started">Selengkapnya</a>
			          	</div>
		        	</div>
		        </div>
		    </div>
      
    	</div>

  	</div>
</section>

<!--==========================
      Contact Lain Section
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
            	<p><a href="https://www.facebook.com/ITCC.Udayana"><img style="width: 30px;" src="{{asset('asset1/images/facebook.png')}}"></a><a href="https://twitter.com/ITCCUdayana"><img style="width: 30px;" src="{{asset('asset1/images/twitter.png')}}"></a><a href="https://www.instagram.com/itcc_udayana/"><img style="width: 30px;" src="{{asset('asset1/images/instagram.png')}}"></a><a href="https://ask.fm/itcc_udayana"><img style="width: 30px;" src="{{asset('asset1/images/Askfm.png')}}"></a><a href="https://bit.ly/ITCCUdayana"><img style="width: 30px;" src="{{asset('asset1/images/line.png')}}"></a></p>
                    
          	</div>

        </div>

    </div>
</section><!-- #contact -->
@endsection