@extends('layout.dashboard-juri-template')

@section('title')
    Form Penilaian - ITCC 2018
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<center><h3>Data Karya Peserta</h3></center>
	</div>

	<div class="row">

		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Tim</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>Nama Tim</td>
								<td>Nama Tim</td>
							</tr>
							<tr>
								<td>Nama Institusi</td>
								<td>Nama Institusi</td>
							</tr>
							<tr>
								<td>Judul Karya</td>
								<td>Judul Karya</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Pemberitahuan</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<div class="alert alert-warning">
                       	<p>Hai, {{Auth::user()->fullname}}
                       	<br> Selamat menilai karya peserta, pastikan anda melakukan penilaian secara objektif dan sesuai dengan karya peserta. Salam hangat dari panitia ITCC 2018.</p>
                    	</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="panel">
				
				<div class="panel-heading">
					<h3 class="panel-title">Form Penilaian Peserta</h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>

				<div class="panel-body">

					<div class="alert alert-success" role="center" align="center">
						<p><b>Perhatian</b></p>
						<p>Sebelum mengisi form penilaian, harap untuk membuka karya peserta dengan menekan tombol dibawah ini.</p>
						<br>
						<a href="#" class="btn btn-primary">Proposal</a>
						<a href="#" class="btn btn-info">Lampiran</a>
					</div>

					<form action="/form-nilai" class="form-horizontal" method="post" id="form-penilaian">
						@csrf

						<table class="table table-striped table-bordered">
							<thead>
								<th class="col-xs-1 col-sm-1">No</th>
								<th class="col-xs-8 col-sm-9">Aspek Penilaian</th>
								<th class="col-xs-3 col-sm-2">Nilai</th>
							</thead>
							<tbody>
								<tr>
									<td>No</td>
									<td>Aspek</td>
									<td>
										<input type="hidden" name="form[]" value="a">
										<input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35">
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn btn-primary btn-lg">Submit</button>
					</form>
				</div>

			</div>
		</div>


	</div>

</div>
@endsection