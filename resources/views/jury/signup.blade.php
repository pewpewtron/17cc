@extends('layout.template')
@section('title')
	Pendaftaran Juri - ITCC 2018
@endsection

@section('navbar')
<li><a href="/">Beranda</a></li>
<li class="menu-has-children"><a href="#">Pendaftaran</a>
  	<ul>
    	<li><a href="/signup-prog">Lomba Pemrograman</a></li>
    	<li><a href="/signup-web">Lomba Desan Web</a></li>
    	<li><a href="/signup-lcc">Lomba Cerdas Cermat</a></li>
    	<li><a href="/signup-si">Lomba Sistem Informasi</a></li>
    	<li><a href="/signup-idea">Lomba Pengembangan Ide Bisnis TIK</a></li>
  	</ul>
</li>
<li><a href="/login">Masuk</a></li>
<li><a href="/faq">FAQ</a></li>
@endsection

@section('intro')
<!--HEADER WEBSITE-->
<div id="bg-content" >
    <div class="container">
        <div class="row pendaftaran-body">
           
            <div class="col-md-2 hidden-sm hidden-xs"></div>
            <div class="col-md-8 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  
                <section id="daftar">
                  	<div class="form" style="background-color: white;">
                  		<div class="box" style="margin-top: 50px;">
	                  		<form method="post" action="#" class="contactForm">

		                     	<div class="box-body">
                      				<h3 style="text-align: center; font-size: 30px;">Form Pendaftaran Juri</h3>
                        			<div class="box-body-col">
                           				<h4>Data Diri</h4>
                           				<div class="form-group row">
                             				<label for="name" class="col-md-3 col-form-label">Nama Lengkap</label>
				                            <div class="col-md-9">
				                                <input class="form-control" placeholder="ex. 'Team Greentea'" name="name" type="text">
				                            </div>
                           				</div>
                           				<div class="form-group row">
                             				<label for="institution" class="col-md-3 col-form-label">Kategory Lomba</label>
                             				<div class="col-md-9">
                                 				<select name="category" class="form-control">
                                  					<option value="" disabled selected>Kategori Lomba</option>
                                  					<option value="IDEA">IDEA</option>
                                  					<option value="SI">SI</option>             
                                  			</select>
                             				</div>
                           				</div>
                           			</div>

                        			<div class="box-body-col">
                           				<h4>Data Autentifikasi</h4>
				                        <div class="form-group row">
				                        	<label class="col-md-3 col-form-label">Username</label>
				                            <div class="col-md-9">
				                                <input class="form-control" placeholder="nama pengguna" name="username" type="text">
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                            <label class="col-md-3 col-form-label">Password</label>
				                            <div class="col-md-9">
				                                <input class="form-control" placeholder="kata sandi" name="password" id="pass" type="password">
				                            </div>
				                        </div>
				                        <div class="form-group row">
				                            <label class="col-md-3 col-form-label">Konfirmasi Password</label>
				                        	<div class="col-md-9">
				                                <input class="form-control" placeholder="ulangi kata sandi" name="passconf" id="pass2nd" type="password">
				                                 <span id='message'></span>
				                            </div>
				                        </div>
                           			</div>
				                        
                        			
                        			<!--script type="text/javascript">
			                           $('#pass2nd').on('keyup', function () {
			                                 if ($(this).val() == $('#pass').val()) {
			                                     $('#message').html('Konfirmasi Password Cocok').css('color', 'green');
			                              } 
			                              else $('#message').html('Konfirmasi Password Tidak Cocok').css('color', 'red');
			                           });
                        			</script-->
                         			<button type="submit" style="margin: 0px;width: 100%;margin-top: 20px;">Daftar</button>
                     			</div>

		                	</form>
	                	</div>
               		</div>
                </section>

            </div>
        	<div class="col-md-2 hidden-sm hidden-xs"></div>

	    </div>
    </div>
</div>
<!--//HEADER WEBSITE-->
@endsection