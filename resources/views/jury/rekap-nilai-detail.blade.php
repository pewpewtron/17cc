@extends('layout.dashboard-juri-template')

@section('title')
    Rekap Nilai - ITCC 2018
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
<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Rekap Seluruh Penilaian Juri</h3>
					</div>
					<div class="panel-body table-responsive">
						<table class="table table-stripped table-bordered" id="example">
							<thead>
								<tr>
									<th>Institusi</th>
									<th>Tim</th>
									<th>Judul Karya</th>
									<th>Total Nilai</th>
									<th>Peringkat</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1?>
								@foreach($hasil as $t)
								<tr>
									<td>{{$t->institution}}</td>
									<td>{{$t->group_name}}</td>
									<td>{{$t->title}}</td>
									<td>{{$t->total_nilai}}</td>
									<td>{{$i++}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<!--form action="/pesan" method="post">

							@foreach($hasil as $tim)
								<input type="hidden" name="object_id[]" value="{{$tim->karya}}">
							@endforeach

							@foreach($juri as $j)
								<input type="hidden" name="jury_id[]" value="{{$j->jury_id}}">
							@endforeach

							<button class="btn btn-primary">Tetapkan Finalis</button>
						</form-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
@endsection