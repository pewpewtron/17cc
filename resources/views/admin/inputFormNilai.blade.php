@extends('layout.dashboard-admin-template')

@section('title')
    Dashboard Admin - ITCC 2018
@endsection

@section('pesan')
@if(count($jumlahPesan)!=0)
	<span class="badge bg-danger">{{count($jumlahPesan)}}</span>
@endif
@endsection

@section('content')
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><center>Form Penilaian</center></h3>
				</div>
				<div class="panel-body">
					<button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Tambah Penilaian" type="button"><i class="glyphicon glyphicon-plus"></i></button>
					<br><br>
					<form action="#" method="post" class="form-horizontal">
						<table class="table table-striped table-bordered table-responsive">
							<thead>
								<tr>
									<th>No</th>
									<th>Aspek Penilaian</th>
									<th>Aksi</th>
								</tr>							
							</thead>
							<tbody>
								<tr>
									<td>No</td>
									<td>
										<input type="text" name="aspect" class="form-control" placeholder="ex. Kesesuain dengan tema">
									</td>
									<td>
										<a href="#" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
@endsection