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

<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
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
      <li><a href="/daftar/desainweb">Lomba Desain Web</a></li>
      <li><a href="/daftar/cerdascermat">Lomba Cerdas Cermat</a></li>
      <li><a href="/daftar/android">Lomba Pengembangan Aplikasi Android</a></li>
      <li><a href="/daftar/idebisnis">Lomba Pengembangan Ide Bisnis TIK</a></li>
    </ul>
</li>
<li><a href="/login">Masuk</a></li>
<li><a href="/faq">FAQ</a></li>
@endsection

@section('intro')
<script id="twitter-wjs" type="text/javascript" async defer src="//platform.twitter.com/widgets.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!--==========================
    Hero Section
============================-->
<section id="hero">
    <div class="container">

      	<div class="row padding-hero">
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
                           <a href="/guidebook/GUIDEBOOK_LCC_ITCC_2018.pdf">Cabang Lomba Cerdas Cermat</a><br>
                           <a href="/guidebook/GUIDEBOOK_DESAIN_WEB_ITCC_2018.pdf">Cabang Lomba Desain Web</a><br>
                           <a href="/guidebook/GUIDEBOOK_PEMROGRAMAN_ITCC_2018.pdf">Cabang Lomba Pemrograman</a><br>
                           <a href="/guidebook/GUIDEBOOK_IDEA_ITCC_2018.pdf">Cabang Lomba Pengembangan Ide Bisnis TIK</a><br>
                           <a href="/guidebook/GUIDEBOOK_ANDROID_ITCC_2018.pdf">Cabang Lomba Pengembangan Aplikasi Android</a><br>
                          </p>
                  		</li>
                  		<hr style="background-color:#202a2d; ">
                  		<li>
                        <h3 style="margin: 0px;color: #0575e6;  margin-top: 10px;">Plugin Cabang Lomba Desain Web</h3>
                        <span class="fa fa-clock-o" style="font-size: 12px;"> 1 Agustus 2018</span> 
                          <p style="color: #202a2d; text-align: justify;">
                           Plugin web yang dapat digunakan pada Cabang Lomba Desain Web dapat diunduh pada tautan berikut ini.<br>
                           <a href="/download/plugin.zip">Plugin Web</a><br>
                          </p>
                      </li>
                	</ul>
             	 </div>
            </div>
          
        </div>
        
    </div>
</section><!-- #informasi -->

<!--==========================
      Jadwal
============================-->
<section id="jadwal" class="wow fadeIn">
  
  <div class="demo">
    <div class="container">

      <div class="section-header">
        <h3 class="section-title">Jadwal ITCC 2018</h3>
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
                <p class="description text-center" style="font-size: 15px;"> 
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">Pembukaan pendaftaran gelombang 1 untuk cabang lomba kategori SMA/SMK dan Pembukaan pendaftaran untuk cabang lomba kategori Mahasiswa/Umum.</p>
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
                <p class="description text-center" style="font-size: 15px;"> 
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">
                  Penutupan pendaftaran gelombang 1 lomba kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">1<sup>st</sup></span>
                  <span class="month">Sept</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Pembukaan Pendaftaran Gelombang 2</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Desain Web</span>
                  <span class="badge badge-info">Cerdas Cermat</span>
                  <span class="badge badge-info">Pemrograman</span>
                </p>
                <p class="description text-center">
                  Pembukaan pendaftaran gelombang 2 lomba kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">30<sup>th</sup></span>
                  <span class="month">Sept</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Penutupan Pendaftaran</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Desain Web</span>
                  <span class="badge badge-info">Cerdas Cermat</span>
                  <span class="badge badge-info">Pemrograman</span>
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                </p>
                <p class="description text-center">
                  Penutupan pendaftaran gelombang 2 lomba kategori SMA/SMK/Sederajat se-Bali dan Penutupan pendaftaran lomba kategori mahasiswa dan umum se-Indonesia. Batas Akhir Pengumpulan berkas Submisi Tahap I
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">8<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Pengumuman Submisi Tahap I</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">
                  Pengumuman hasil Submisi Tahap I sekaligus pembukaan pengumpulan Submisi Tahap II
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">12<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Warming Up</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pemrograman</span>
                </p>
                <p class="description text-center">
                  Warming up hari pertama cabang lomba Pemrograman kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">14<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Batas Akhir Pengumpulan Berkas</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                </p>
                <p class="description text-center">
                  Batas akhir pengumpulan proposal cabang lomba Pengembangan Ide Bisnis TIK
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">19<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Warming Up</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pemrograman</span>
                </p>
                <p class="description text-center">
                  Warming up hari terakhir cabang lomba Pemrograman kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">22<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Batas Akhir Pengumpulan Berkas</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">
                  Batas akhir pengumpulan submisi tahap 2 cabang lomba Pengembangan Aplikasi Android kategori Mahasiswa se-Indonesia
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">30<sup>th</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Pengumuman Finalis</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                </p>
                <p class="description text-center">
                  Pengumuman finalis cabang lomba kategori Mahasiswa dan Umum se-Indonesia
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">31<sup>st</sup></span>
                  <span class="month">Okt</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Pre-Final</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">
                  Pembukaan Pre-final cabang lomba Pengembangan Aplikasi Android kategori Mahasiswa se-Indonesia
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">7<sup>th</sup></span>
                  <span class="month">Nov</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Pre-Final</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                </p>
                <p class="description text-center">
                  Penutupan Pre-final cabang lomba Pengembangan Aplikasi Android kategori Mahasiswa se-Indonesia
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">11<sup>st</sup></span>
                  <span class="month">Nov</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Technical Meeting</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Desain Web</span>
                  <span class="badge badge-info">Cerdas Cermat</span>
                  <span class="badge badge-info">Pemrograman</span>
                </p>
                <p class="description text-center">
                  Technical Meeting lomba kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">13<sup>rd</sup></span>
                  <span class="month">Nov</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Technical Meeting</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                </p>
                <p class="description text-center">
                  Technical Meeting lomba kategori Umum dan Mahasiswa se-Indonesia
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInLeft">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">15<sup>th</sup></span>
                  <span class="month">Nov</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Hari H Pertama ITCC 2018</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
                <p class="description text-center">
                  Babak final cabang lomba kategori Mahasiswa dan Umum se-Indonesia<br>
                  Babak penyisihan bagi cabang lomba <b>Pemrograman</b> dan <b>Desain Web</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Babak penyisihan serta semifinal 1 dan 2 bagi cabang lomba <b>Cerdas Cermat</b> kategori SMA/SMK/Sederajat se-Bali
                </p>
              </div>
            </div>

            <div class="timeline wow fadeInRight">
              <div class="timeline-content">
                <span class="date">
                  <span class="day">16<sup>th</sup></span>
                  <span class="month">Nov</span>
                  <span class="year">2018</span>
                </span>
                <h2 class="title">Hari H Kedua ITCC 2018</h2>
                <p class="text-center description" style="font-size: 15px;">
                  <span class="badge badge-info">Pengembangan Ide Bisnis TIK</span>
                    <span class="badge badge-info">Pengembangan Aplikasi Android</span>
                    <span class="badge badge-info">Pemrograman</span>
                    <span class="badge badge-info">Desain Web</span>
                    <span class="badge badge-info">Cerdas Cermat</span>
                </p>
                <p class="description text-center">
                  Expo cabang lomba kategori Mahasiswa dan Umum se-Indonesia<br>
                  Babak final bagi cabang lomba <b>Pemrograman</b> dan <b>Desain Web</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Babak semifinal 3 dan 4 serta final bagi cabang lomba <b>Cerdas Cermat</b> kategori SMA/SMK/Sederajat se-Bali<br>
                  Penyerahan hadiah bagi cabang lomba kategori SMA/SMK/Sederajat serta Mahasiswa dan Umum
                </p>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>

</section>

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
              <a class="twitter-timeline" data-width="360" data-height="500" data-theme="light" data-link-color="#021b79" href="https://twitter.com/itcc_udayana" style="color: #0575e6;">Tweets by ITCCUdayana</a>
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