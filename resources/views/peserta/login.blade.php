@extends('layout.template')
@section('title')
	Masuk - ITCC 2018
@endsection

@section('navbar')
<li><a href="/">Beranda</a></li>
<li class="menu-has-children"><a href="#">Pendaftaran</a>
    <ul>
      <li><a href="/daftar/pemrograman">Lomba Pemrograman</a></li>
      <li><a href="/daftar/desainweb">Lomba Desan Web</a></li>
      <li><a href="/daftar/cerdascermat">Lomba Cerdas Cermat</a></li>
      <li><a href="/daftar/android">Lomba Pengembangan Aplikasi Android</a></li>
      <li><a href="/daftar/idebisnis">Lomba Pengembangan Ide Bisnis TIK</a></li>
    </ul>
</li>
<li><a href="/login">Masuk</a></li>
<li><a href="/faq">FAQ</a></li>
@endsection

@section('intro')
<!--HEADER WEBSITE-->
<div id="bg-login" >
    <div class="container">

        <div class="row pendaftaran-body">
           
            <div class="col-md-2 hidden-sm hidden-xs"></div>
            <div class="col-md-8 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

            	@if (\Session::has('success'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <i class="fa fa-check"></i> <strong>{{ \Session::get('success') }}</strong>
				    </div>
				@elseif(\Session::has('error'))
					<div class="alert alert-danger alert-dismissible" role="alert">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <i class="fa fa-check"></i> <strong>{{ \Session::get('error') }}</strong>
				    </div>
				@elseif(\Session::has('warning'))
					<div class="alert alert-warning alert-dismissible" role="alert">
				        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <i class="fa fa-check"></i> <strong>{{ \Session::get('warning') }}</strong>
				    </div>
				@endif
                  
                <section id="daftar">
                  	<div class="form" style="background-color: white;">
                  		<form method="post" action="{{ url('/login') }}" class="contactForm">
						  	{{ csrf_field() }}
	                        <div class="row" style="width: 100%; min-height: 450px; margin-right: 0px; margin-left: 0px; margin-top: 40px;">

	                     		<div class="col-md-4 login-page" style="background: #343b40; height: 450px;">
				                    <img src="asset/images/logo-itcc5.png" style="width: 70%;margin-left: 35px;margin-top: 70px;" class="img-responsive center-block ">
				                    <h3 style="color: white; text-align: center;">Tema ITCC 2018</h3>
				                    <h4 style="color:#a2c8cc; text-align: center;">"Powering Smart Society with Information Technology"</h4>
				                    <hr style="width: 80%; color: white; margin-bottom: 5px;">
				                    <p style="margin-left: 35px;"><a href="https://www.facebook.com/ITCC.Udayana"><img style="width: 30px;" src="asset/images/facebook.png"></a><a href="https://twitter.com/ITCCUdayana"><img style="width: 30px;" src="asset/images/twitter.png"></a><a href="https://www.instagram.com/itcc_udayana/"><img style="width: 30px;" src="asset/images/instagram.png"></a><a href="https://ask.fm/itcc_udayana"><img style="width: 30px;" src="asset/images/Askfm.png"></a><a href="https://bit.ly/ITCCUdayana"><img style="width: 30px;" src="asset/images/line.png"></a></p>
	                        
	                     		</div>
	                     		<div class="col-md-8" style="margin-top: 70px; padding-left: 50px; padding-right: 50px; ">

	                        		<h1 style="text-align: center; color: #232323; margin-bottom: 50px;">Login</h1>
	                        		<hr style="color: black;">
	                        		<div class="input-group">
	                        			<div class="input-group-prepend">
	                        				<span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
	                        			</div>
	                        			<input value="{{ old('username') }}"  type="text" class="form-control" placeholder="username" name="username">
	                        		</div>
	                        		<br>
	                        		<div class="input-group">
	                        			<div class="input-group-prepend">
	                        				<span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
	                        			</div>
	                           			<input type="password" class="form-control" placeholder="kata sandi" name="password">
	                        		</div>
	                     			<button class="btn-login" type="submit" style="margin: 0px;width: 100%;margin-top: 20px;"><i class="fa fa-sign-in fa-fw"></i> Masuk</button>
	                     		</div>
	                     	</div>
	                	</form>
               		</div>
                </section>

            </div>
        	<div class="col-md-2 hidden-sm hidden-xs"></div>

	    </div>
    </div>
</div>
<!--//HEADER WEBSITE-->
@endsection