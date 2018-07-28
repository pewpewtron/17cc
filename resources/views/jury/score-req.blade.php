@extends('layout.dashboard-juri-template')

@section('title')
    Dashboard Juri - ITCC 2018
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
						<h3 class="panel-title">Pesan</h3>
					</div>
					<div class="panel-body table-responsive">
						<table class="table table-striped" id="example">
							<thead>
								<tr>
									<th>Instansi</th>
									<th>Tim</th>
									<th>Judul Ide</th>
									<th>Penilaian</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($groups as $tim)
								<tr>
									<td>{{$tim->institution}}</td>
									<td>{{$tim->group_name}}</td>
									<td>{{$tim->title}}</td>
									<td>{{'Belum Ternilai'}}</td>
									<td>
										<a class="btn btn-primary btn-sm view" style="margin:2px;" data-toggle="modal" data-target="#edit-item{{$tim->id}}" type="button"><i class="glyphicon glyphicon-pencil"></i> Input Nilai</a>
										<!-- Modal Delete -->
    									<div id="edit-item{{$tim->id}}" class="modal fade" role="dialog">
        									<div class="modal-dialog">

									            <!-- Modal content-->
									            <div class="modal-content">
									                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
									                    <button type="button" class="close" data-dismiss="modal">&times;</button>
									                    <h4 class="modal-title"><center>Konfirmasi</center></h4>
									                </div>
									                <div class="modal-body">
									                    <p>Apakah anda yakin ingin ingin melakukan penilaian?</p>
									                    <form action="/pesan/{{$tim->id}}" method="post">
									                    	@csrf
															{{method_field('PUT')}}
									                    	<input type="hidden" name="file_id" value="{{$tim->file_id}}">
									                    	<input type="hidden" name="jury_id" value="{{$tim->jury_id}}">
									                    	<input type="hidden" name="status" value="1">
									                    	<div class="modal-footer">
									                    		<button type="submit" class="btn btn-primary">Ya</button>
									                		</div>
									                    </form>
									                </div>
									            </div>

        									</div>
    									</div>
    									<!-- End Modal Delete -->
									</td>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
@endsection