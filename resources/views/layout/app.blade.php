<!DOCTYPE html>
<html>
<head>
  <title>ITCC 2018 - Information Technology Creative Competition 2018</title>
	<!--fav icon-->
    <link rel="icon" type="image/jpg" href="{{asset('asset/images/logoitcc.png')}}">

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!--css-->
    <link href="{{asset('asset/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  	<link href="{{asset('asset/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  	<link href="{{asset('asset/lib/animate-css/animate.min.css')}}" rel="stylesheet">
  	<link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
  	<link href="{{asset('asset/css/myStyle.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/custom.css')}}" rel="stylesheet">

    <!--meta-->
    <meta name       ="description" content="Information Technology Creative Competition (ITCC) adalah kompetisi bidang Teknologi Informasi yang diselenggarakan oleh Himpunan Mahasiswa Teknologi Informasi (HMTI), Fakultas Teknik, Universitas Udayana.">
    <meta name       ='keywords' content="ITCC 2018, TI Udayana, Fakultas Teknik, Universitas Udayana, ITCC Unud, ITCC Udayana"/>
    <meta http-equiv ="content-type" content="text/html;charset=UTF-8">
    <meta property   ="og:type" content="website" />
    <meta property   ="og:title" content="ITCC 2018" />
    <meta property   ="og:site_name" content="ITCC 2018"/>
    <meta property   ="og:image" itemprop="image" content="images/capture1.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
</head>
<body>
	@yield('intro')

	<!--header-->
	<header id="header" class="color-red">
		<div class="container">

			<div id="logo" class="pull-left">
				<a href="#hero"><img src="asset/images/logo_top_left.png" alt="" title="" /></img></a>
			</div>

			<!--navbar-->
			<nav id="nav-menu-container">
		        <ul class="nav-menu">
			        <li><a href="#hero">Beranda</a></li>
			        <li><a href="#about">Profile</a></li>
			        <li><a href="#lomba-itcc">Lomba</a></li>
			        <li><a href="#services">Jadwal</a></li>
			        <li><a href="#kontak">Kontak</a></li>
			        <li><a href="#">FAQ</a></li>
              
		        </ul>
      		</nav>
      		<!--end navbar-->
			
		</div>
	</header>
	<!--end header-->
  <!--javascript-->
    <script src="{{asset('asset/lib/jquery/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('asset/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/lib/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('asset/lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{asset('asset/lib/superfish/superfish.min.js')}}"></script>
    <script src="{{asset('asset/lib/morphext/morphext.min.js')}}"></script>
    <script src="{{asset('asset/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('asset/lib/stickyjs/sticky.js')}}"></script>
    <script src="{{asset('asset/lib/easing/easing.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <script src="{{asset('asset/contactform/contactform.js')}}"></script>

	@yield('content')


</body>
</html>