<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--fav icon-->
    <link rel="icon" type="image/jpg" href="{{asset('asset/images/logoitcc.png')}}">

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- CSS -->
    <link href="{{asset('asset/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/icon-sets.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/main.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/demo.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/css/dataTables.bootstrap.min.css')}}">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- Javascript -->
    <script src="{{asset('asset/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asset/lib/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('asset/js/klorofil.min.js')}}"></script>
    <script src="{{asset('DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('DataTables/js/dataTables.bootstrap.min.js')}}"></script>
    
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- SIDEBAR -->
        <div class="sidebar" style="background-color: #021B79">
            <div class="brand" style="background-color: #021B79">
                <a href="/"><img src="{{asset('asset/images/logo-itcc5.png')}}" alt="ITCC Logo" class="img-responsive logo" width="100px" height="100px"></a>
            </div>
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li class="hidden-lg"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #021B79"><img src="{{asset('asset/images/user.png')}}" width="30px" height="30px" class="img-circle" alt="Avatar"> <span style="color: white">{{Auth::guard('admin')->user()->fullname}}</span></a></li>
                        <li><a><i class="glyphicon glyphicon-tags"></i> 
                            <span>Admin {{Auth::guard('admin')->user()->competition->short_name}}</span>
                        </a></li>
                        <li><a href="/admin"><i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="/admin/verif_group"><i class="glyphicon glyphicon-list-alt"></i> <span>Verifikasi</span></a></li>
                        {{-- <li><a href="/logUpload"><i class="glyphicon glyphicon-cloud-upload"></i> <span>Log Unggah</span></a></li> --}}

                        {{-- lihat upload file ANDROID --}}
                        @if(Auth::user()->competition_id == 5)
                        <li><a href="{{ route('lihatfile.index') }}"><i class="glyphicon glyphicon-cloud-upload"></i> <span>Lihat File Terupload</span></a></li>
                        @endif
                        {{--  --}}

                        {{-- lihat upload file IDEA --}}
                        @if(Auth::user()->competition_id == 4)
                        <li><a href="{{ route('lihatfileIdea.index') }}"><i class="glyphicon glyphicon-cloud-upload"></i> <span>Lihat File Terupload</span></a></li>
                        @endif
                        {{--  --}}

                        @if(Auth::user()->competition_id==2)
                        <li><a href="/berkas-web-peserta"><i class="glyphicon glyphicon-cloud-upload"></i> <span>Bahan Web Peserta</span></a></li>
                        @endif

                        @if(Auth::user()->competition_id==1 or Auth::user()->competition_id==2 or Auth::user()->competition_id==3)
                        <li><a href="/verifikasiPeserta"><i class="glyphicon glyphicon-euro"></i> <span>Pembayaran</span></a></li>
                        <li><a href="/tambahPeserta"><i class="glyphicon glyphicon-plus-sign"></i> <span>Tambah Peserta</span></a></li>
                        @endif

                        @if(Auth::user()->competition_id==4 or Auth::user()->competition_id==5)
                        <li><a href="/tambahJuri"><i class="glyphicon glyphicon-plus-sign"></i> <span>Tambah Juri</span></a></li>
                        <!-- <li><a href="/inputFormPenilaian"><i class="glyphicon glyphicon-plus-sign"></i> <span>Input Form Penilaian</span></a></li> -->
                        @endif

                        {{-- <li><a href="/pesanAdmin"><i class="glyphicon glyphicon-envelope"></i> <span>Pesan Masuk</span> @yield('pesan')</a></li> --}}
                        {{-- <li><a href="/pesanAdminKeluar"><i class="glyphicon glyphicon-envelope"></i> <span>Pesan Keluar</span></a></li> --}}
                        <li><a href="/kirimEmail"><i class="glyphicon glyphicon-envelope"></i> <span>Kirim Email</span></a></li>
                        <li><a href="/kelolakompetisi/{{Auth::user()->competition_id}}"><i class="glyphicon glyphicon-tower"></i> <span>Kelola Kompetisi</span></a></li>
                        <li class="hidden-lg"><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END SIDEBAR -->
        <!-- MAIN -->
        <div class="main">

            <!-- NAVBAR -->
            <nav class="navbar navbar-default" style="background-color: #021B79">
                <div class="container-fluid">
                    <div class="navbar-btn">
                        <button type="button" class="btn-toggle-fullwidth"><i class="fa fa-bars" style="color: white"></i></button>
                    </div>
                    <div id="navbar-menu" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <!--li class="dropdown">
                                <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown" style="background-color: #021B79">
                                    <i class="fa fa-bell" style="color: white"></i>
                                    <span class="badge bg-danger">5</span>
                                </a>
                                <ul class="dropdown-menu notifications">
                                    <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                    <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                    <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                    <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                    <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                    <li><a href="#" class="more">See all notifications</a></li>
                                </ul>
                            </li-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background-color: #021B79">
                                    <img class="img-circle" src="{{asset('asset/images/user.png')}}" width="30px" height="30px" alt="Avatar"> <span style="color: #fff"> {{Auth::guard('admin')->user()->fullname}}</span>  <i class="fa fa-chevron-down" style="color: #fff; font-size: 10px;"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- END NAVBAR -->
            <!-- MAIN CONTENT -->
            <div class="main-content">
                @yield('content')
            </div>
            <!-- END MAIN CONTENT -->
            <footer>
                <div class="container-fluid">
                    <p class="copyright" style="color: #021B79;">&copy; Information Technology Creative Competition 2018 | <a href="http://it.unud.ac.id" style="color: #0575E6;">Teknologi Informasi Udayana</a></p>
                </div>
            </footer>
        </div>
        <!-- END MAIN -->
    </div>
    <!-- END WRAPPER -->
    
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

</body>

</html>
