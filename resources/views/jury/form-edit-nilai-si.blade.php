@extends('layout.dashboard-juri-template')

@section('title')
    Form Penilaian - ITCC 2018
@endsection

@section('content')
<div class="main-content">
	<div class="container-fluid">
		
		<div class="row">
			<center><h3>Edit Penilaian Karya Peserta</h3></center>
		</div>

		<div class="row" style="margin-top: 30px;">
			
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
									<td>{{$dataSecore->scoreReq->object->group->group_name}}</td>
								</tr>
								<tr>
									<td>Nama Institusi</td>
									<td>{{$dataSecore->scoreReq->object->group->institution}}</td>
								</tr>
								<tr>
									<td>Judul Karya</td>
									<td>{{$dataSecore->scoreReq->object->title}}</td>
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
                        	<br> Pastikan Anda telah yakin untuk melakukan perubahan pada penilaian yang telah Anda berikan. Salam hangat dari panitia ITCC 2018.</p>
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
						</div>
						<div class="table-responsive">
							<form action="#" class="form-horizontal" method="post" id="form-penilaian">
								<table class="table table-striped table-bordered">
									<thead>
										<th class="col-xs-1 col-sm-1">No</th>
										<th class="col-xs-8 col-sm-9">Aspek Penilaian</th>
										<th class="col-xs-3 col-sm-2">Nilai</th>
									</thead>
									<tbody>
										<tr>
											<td colspan="3" align="center">Kesesuaian</td>
										</tr>
										<tr>
											<td>a</td>
											<td>Kesesuaian dengan tema “Technovation for Smart Living Environment”</td>
											<td>
												<input type="hidden" name="form[]" value="a">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
											</td>
										</tr>
										<tr>
											<td>b</td>
											<td>Urgensi permasalahan yang diangkat</td>
											<td>
												<input type="hidden" name="form[]" value="b">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Kreativitas dan Inovasi</td>
										</tr>
										<tr>
											<td>c</td>
											<td>Ide orisinil atau tidak menjiplak aplikasi lain</td>
											<td>
												<input type="hidden" name="form[]" value="c">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 10" min="1" max="10">
											</td>
										</tr>
										<tr>
											<td>d</td>
											<td>Solusi yang permasalahan yang ditawarkan aplikasi, serta memberikan manfaat yang besar</td>
											<td>
												<input type="hidden" name="form[]" value="d">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
											</td>
										</tr>
										<tr>
											<td>e</td>
											<td>Fitur menarik dan inovatif</td>
											<td>
												<input type="hidden" name="form[]" value="e">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Desain Antarmuka</td>
										</tr>
										<tr>
											<td>f</td>
											<td>Layout mock-up aplikasi rapi dan teratur</td>
											<td>
												<input type="hidden" name="form[]" value="f">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 10" min="1" max="10">
											</td>
										</tr>
										<tr>
											<td>g</td>
											<td>Tata letak antar komponen aplikasi seimbang</td>
											<td>
												<input type="hidden" name="form[]" value="g">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 5" min="1" max="5">
											</td>
										</tr>
										<tr>
											<td>h</td>
											<td>Fitur navigasi mudah dipahami user (UX)</td>
											<td>
												<input type="hidden" name="form[]" value="h">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 5" min="1" max="5">
											</td>
										</tr>
										<tr>
											<td>i</td>
											<td>Penscalaan (scalling) komponen aplikasi baik dan seimbang</td>
											<td>
												<input type="hidden" name="form[]" value="i">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 5" min="1" max="5">
											</td>
										</tr>
										<tr>
											<td>j</td>
											<td>Pemilihan warna sesuai dan nyaman untuk user</td>
											<td>
												<input type="hidden" name="form[]" value="j">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 5" min="1" max="5">
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

	</div>
</div>
@endsection