@extends('layout.dashboard-admin-template')

@section('title')
    Dashboard Admin - ITCC 2018
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Bahan Web Peserta</h3>
				</div>

				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered data" id="example">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Peserta</th>
								<th>Asal Sekolah</th>
								<th>Nama Berkas</th>
								<th>Keterangan</th>
								<th>Terakhir Diupload</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1 ?>
							@foreach($berkas as $b)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$b->group_name}}</td>
								<td>{{$b->institution}}</td>
								<td>{{$b->berkasWeb->file}}</td>
								<td>{{$b->berkasWeb->etc}}</td>
								<td>{{ date('d-m-Y H:i', strtotime($b->berkasWeb->created_at)) }}</td>
								<td>
									<a href="{{asset('uploads/berkas_web/'.$b->berkasWeb->file)}}" target="_blank" class="btn btn-primary btn-sm">Download</a>
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
@endsection