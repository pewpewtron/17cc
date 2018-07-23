@extends('layout.dashboard-juri-template')

@section('title')
    Rekap Nilai - ITCC 2018
@endsection

@section('nav')
    <li class="hidden-lg"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #021B79"><img class="img-circle" src="{{asset('asset/images/user.png')}}" width="30px" height="30px" alt="Avatar"> <span style="color: white">{{Auth::guard('jury')->user()->fullname}}</span></a></li>
    <li><a href="/juri"><i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="/pesan"><i class="glyphicon glyphicon-envelope"></i> <span>Pesan</span> @if(count($pesan)==0)<span class="badge bg-danger" style="display: none;">{{count($pesan)}}</span> @else<span class="badge bg-danger">{{count($pesan)}}</span>@endif</a></li>
    <li><a href="/rekap-nilai"><i class="glyphicon glyphicon-list-alt"></i> <span>Detail Penilaian</span></a></li>
    <li><a href="/rekap-nilai-detail"><i class="glyphicon glyphicon-list-alt"></i> <span>Rekap Nilai</span></a></li>
    <li><a href="/juriSetting"><i class="glyphicon glyphicon-cog"></i> <span>Setting</span></a></li>
    <li><a href="/juriSetting"><i class="glyphicon glyphicon-cog"></i> <span>Setting</span></a></li>
    <li class="hidden-lg"><a href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
    <form id="logout-form" action="{{ url('juri/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

@section('content')
<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			 <div class="col-md-12">
			 	<div class="panel">
			 		<div class="panel-heading">
			 			<h3 class="panel-title">Detail Penilaian Juri</h3>
			 		</div>
			 		<div class="panel-body">
			 			<table class="table table-stripped table-bordered" id="example">
			 				<thead>
			 					<tr>
			 						<th rowspan="2">Institusi</th>
			 						<th rowspan="2">Tim</th>
			 						<th rowspan="2">Judul</th>
			 						@if(Auth::user()->competition_id==4)
			 							<th colspan="20"><center>Nama Bagian</center></th>
			 						@else(Auth::user()->competition_id==5)
			 							<th colspan="10"><center>Nama Bagian</center></th>
			 						@endif
			 						<th rowspan="2">Total Nilai</th>
			 					</tr>
			 					<tr>
			 						<th>a</th>
                                  	<th>b</th>
                                  	<th>c</th>
                                  	<th>d</th>
                                  	<th>e</th>
                                  	<th>f</th>
                                  	<th>g</th>
                                  	<th>h</th>
                                  	<th>i</th>
                                  	<th>j</th>
                                  	@if(Auth::user()->competition_id==4)
                                  	<th>k</th>
                                  	<th>l</th>
                                  	<th>m</th>
                                  	<th>n</th>
                                  	<th>o</th>
                                  	<th>p</th>
                                  	<th>q</th>
                                  	<th>r</th>
                                  	<th>s</th>
                                  	<th>t</th>
                                  	@endif
			 					</tr>
			 				</thead>
              <tbody>
                @foreach($group as $tim)
                <tr>
                  <td>{{$tim->institution}}</td>
                  <td>{{$tim->group_name}}</td>
                  <td>{{$tim->title}}</td>
                  @if($nilai!=null)
                  @foreach($nilai as $n)
                  <td>{{$n->score}}</td>
                  @endforeach
                  @endif
                  <td>{{$tim->total_nilai}}</td>
                </tr>
                @endforeach
              </tbody>
			 			</table>
			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
</div>
@endsection