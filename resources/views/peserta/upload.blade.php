@extends('layout.dashboard-template')

@section('title')
    Upload Data - ITCC 2018
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
			<h3><center>Upload Berkas Lomba</center></h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel">

					<div class="panel-heading">
						<h3 class="panel-title"><center>Upload File</center></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
						
							<div class="form-group">
								<label class="control-label col-md-3">Judul</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="title" placeholder="Judul"/>
								</div>
							</div>	
							<div class="form-group">
								<label class="control-label col-md-3">Berkas Lomba</label>
								<div class="col-md-9">
									<input type="file" name="file" class="form-control" accept=".pdf,.jpg,.png">
									<small>Berkas dalam bentuk file .pdf/.jpg/.png</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Keterangan</label>
								<div class="col-md-9">
									<textarea class="form-control" name="etc" placeholder="Input Keterangan"></textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
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
						<p style="text-align: justify; text-justify: inter-word;">Data Proposal yang diunggah dalam bentuk pdf dan data poster yang diunggah dalam bentuk jpg atau png. <b>Pastikan kelengkapan data yang anda kirim.</b></p>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection