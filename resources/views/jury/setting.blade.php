@extends('layout.dashboard-juri-template')

@section('title')
    Setting Juri - ITCC 2018
@endsection

@section('nav')
    <li class="hidden-lg"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #021B79"><img class="img-circle" src="{{asset('asset/images/user.png')}}" width="30px" height="30px" alt="Avatar"> <span style="color: white">{{Auth::guard('jury')->user()->fullname}}</span></a></li>
    <li><a href="/juri"><i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="/pesan"><i class="glyphicon glyphicon-envelope"></i> <span>Pesan</span> @if(count($pesan)==0)<span class="badge bg-danger" style="display: none;">{{count($pesan)}}</span> @else<span class="badge bg-danger">{{count($pesan)}}</span>@endif</a></li>
    <!--li><a href="/rekap-nilai"><i class="glyphicon glyphicon-list-alt"></i> <span>Detail Penilaian</span></a></li-->
    <li><a href="/rekap-nilai-detail"><i class="glyphicon glyphicon-list-alt"></i> <span>Rekap Nilai</span></a></li>
    <li><a href="/juriSetting"><i class="glyphicon glyphicon-cog"></i> <span>Setting</span></a></li>
    <li class="hidden-lg"><a href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
    <form id="logout-form" action="{{ url('juri/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3><center>Setting</center></h3>
		</div>
	</div>

	<div class="row" style="margin-top: 20px;">
		<div class="col-md-6">
			<div class="panel">

				<div class="panel-heading">
					<h3 class="panel-title"><center>Ubah Data Autentikasi</center></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<form action="/juriSetting/{{Auth::user()->id}}" method="post">
						@csrf
						{{method_field('PUT')}}
						<div class="form-group row">
                            <label class="col-form-label col-md-3">Username</label>
                            <div class="col-md-9">
                            	<input class="form-control" placeholder="Username Baru" name="username" type="text">
                        	</div>
                        </div>
						<div class="form-group row">
                            <label class="col-form-label col-md-3">Password Baru</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Kata Sandi Baru" name="password" type="password">
                           	</div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Konfirmasi Password</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Ulangi Kata Sandi Baru" name="password_confirmation" type="password">
                            </div>
                        </div>
						<button type="submit" class="btn btn-success">Ganti</button>

					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel">
				
				<div class="panel-heading">
					<h3 class="panel-title">Notifikasi</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<div class="alert alert-warning">
						<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
						<p style="text-align: justify; text-justify: inter-word;">Pastikan anda telah yakin untuk mengubah data autentikasi yang anda miliki</p>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection