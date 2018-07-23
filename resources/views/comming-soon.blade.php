@extends('layout.soon')
@section('content')
<div id="preloader"></div>

<section id="hero">
	<div class="hero-container">
      	<div class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
        	<div class="hero-logo"> 
          		<img class="" src="asset/images/logo-itcc5.png" style="margin-top: 50px;">
        	</div>

        	<h1>Comming Soon</h1>
        	<h2>Cabang Lomba <span class="rotating">Pemrograman, Desain Web, Cerdas Cermat, Pengembangan Ide Bisnis TIK, Sistem Informasi</span></h2>
        	<!--div class="actions">
          		<a href="" class="btn-services" data-toggle="modal" data-target="#myModal"><i class="fa fa-paper-plane"></i> Kirim Saran</a>
        	</div-->
        	<p style="padding-top: 80px;">&copy; Information Technology Creative Competition 2018 | <a href="http://it.unud.ac.id">Teknologi Informasi Udayana</a></p>
      	</div>
    </div>
</section>

<!--start modal-->
<div id="myModal" class="modal fade in">
   	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                <h4 class="modal-title">Information Technology Creative Competition 2018</h4>
            </div>
            <div class="modal-body">
                             
                <section id="contact">
                	<div class="form">
	            		<form action="" method="post" role="form" class="contactForm">
			              	<div class="input-group" style="margin-bottom: 20px;">
			              		<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
				                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"/>                
			              	</div>
			              	<div class="input-group" style="margin-bottom: 20px">
			              		<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
				                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"/>				                
			              	</div>
			              	<div class="input-group" style="margin-bottom: 20px;">
			              		<span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span>
			                	<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"/>
			              	</div>
			              	<div class="input-group" style="margin-bottom: 20px;">
			              		<span class="input-group-addon"><i class="fa fa-file fa-fw"></i></span>
			                	<textarea class="form-control" placeholder="Message"></textarea>
			              	</div>
			              	<div class="modal-footer">
	                			<div class="btn-group">
	                    			<button type="submit" style="margin-bottom: 20px;margin-right: 20px;"><i class="fa fa-paper-plane"></i> Send</button>
	                                  
	                			</div>
	            			</div>
			            </form>
          			</div>
                </section>
                
                <br>
                <p><b class="text-wrapper-type">Media Sosial ITCC 2018:<b></p>
                <p><a href="https://www.facebook.com/ITCC.Udayana"><img style="width: 30px;" src="asset/images/facebook.png"></a><a href="https://twitter.com/ITCCUdayana"><img style="width: 30px;" src="asset/images/twitter.png"></a><a href="https://www.instagram.com/itcc_udayana/"><img style="width: 30px;" src="asset/images/instagram.png"></a><a href="https://ask.fm/itcc_udayana"><img style="width: 30px;" src="asset/images/Askfm.png"></a><a href="https://bit.ly/ITCCUdayana"><img style="width: 30px;" src="asset/images/line.png"></a></p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal -->
@endsection