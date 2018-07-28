@extends('layout.template')
@section('title')
	Login Admin - ITCC 2018
@endsection

@section('intro')
<!--HEADER WEBSITE-->
<div id="bg-login" >
    <div class="container">
        <div class="row pendaftaran-body">
           
            <div class="col-md-2 hidden-sm hidden-xs"></div>
            <div class="col-md-8 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  
                <section id="daftar">
                  	<div class="form" style="background-color: white;">
                  		<form method="post" action="{{ route('admin.login') }}" class="contactForm">
						  	{{ csrf_field() }}
	                        <div class="row" style="width: 100%; min-height: 450px; margin-right: 0px; margin-left: 0px; margin-top: 40px;">

	                     		<div class="col-md-4 login-page" style="background: #343b40; height: 450px;">
				                    <img src="{{ asset('')}}asset1/images/logo-itcc5.png" style="width: 70%;margin-left: 35px;margin-top: 70px;" class="img-responsive center-block ">
				                    <h3 style="color: white; text-align: center;">Tema ITCC 2018</h3>
				                    <h4 style="color:#a2c8cc; text-align: center;">"Tema"</h4>
				                    <hr style="width: 80%; color: white; margin-bottom: 5px;">
				                    <p style="margin-left: 35px;"><a href="https://www.facebook.com/ITCC.Udayana"><img style="width: 30px;" src="{{ asset('')}}asset/images/facebook.png"></a><a href="https://twitter.com/ITCCUdayana"><img style="width: 30px;" src="{{ asset('')}}asset/images/twitter.png"></a><a href="https://www.instagram.com/itcc_udayana/"><img style="width: 30px;" src="{{ asset('')}}asset/images/instagram.png"></a><a href="https://ask.fm/itcc_udayana"><img style="width: 30px;" src="{{ asset('')}}asset/images/Askfm.png"></a><a href="https://bit.ly/ITCCUdayana"><img style="width: 30px;" src="{{ asset('')}}asset/images/line.png"></a></p>
	                        
	                     		</div>
	                     		<div class="col-md-8" style="margin-top: 70px; padding-left: 50px; padding-right: 50px; ">
	                        		<h1 style="text-align: center; color: #232323; margin-bottom: 50px;">Login Panitia</h1>
	                        		<hr style="color: black;">
	                        		<div class="input-group">
	                        			<div class="input-group-prepend">
	                        				<span class="input-group-text"><i class="fa fa-user fa-fw"></i></span>
	                        			</div>
	                        			<input value="{{ old('uname') }}" type="text" class="form-control" placeholder="username" name="uname">
	                        		</div>
	                        		<br>
	                        		<div class="input-group">
	                        			<div class="input-group-prepend">
	                        				<span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
	                        			</div>
	                           			<input type="password" class="form-control" placeholder="kata sandi" name="pword">
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