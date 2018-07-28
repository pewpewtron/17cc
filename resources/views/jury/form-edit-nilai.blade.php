@extends('layout.dashboard-juri-template')

@section('title')
    Form Penilaian - ITCC 2018
@endsection

@section('content')
<div class="main-content">
	<div class="container-fluid">
		
		<div class="row">
			<center><h3>Edit Nilai Peserta</h3></center>
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
									<td>{{$dataSecore->scoreReq->file->group->group_name}}</td>
								</tr>
								<tr>
									<td>Nama Institusi</td>
									<td>{{$dataSecore->scoreReq->file->group->institution}}</td>
								</tr>
								<tr>
									<td>Judul Karya</td>
									<td>{{$dataSecore->scoreReq->file->title}}</td>
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
							<a href="#" class="btn btn-info">Lampiran</a>
						</div>

						<div class="table-responsive">
							<form action="/form-nilai/{{$dataSecore->id}}" class="form-horizontal" method="post">
								@csrf
								{{method_field('PUT')}}
								<input type="hidden" name="score_req_id" value="{{$dataSecore->scoreReq->id}}">
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
												<input type="hidden" name="form[]" value="{{$score[0]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35" value="{{$score[0]->score}}">
											</td>
										</tr>
										<tr>
											<td>b</td>
											<td>Kreativitas, inovasi dan ide usaha yang ditawarkan</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[1]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 40" min="1" max="40" value="{{$score[1]->score}}">
											</td>
										</tr>
										<tr>
											<td>c</td>
											<td>Sistematika penyajian dan detail pembahasan secara keseluruhan</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[2]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35" value="{{$score[2]->score}}">
											</td>
										</tr>
										<tr>
											<td>d</td>
											<td>Memaparkan dengan jelas produk/layanan yang ditawarkan</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[3]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[3]->score}}">
											</td>
										</tr>
										<tr>
											<td>e</td>
											<td>Produk/layanan yang sangat menarik/atraktif/up-to-date</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[4]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[4]->score}}">
											</td>
										</tr>
										<tr>
											<td>f</td>
											<td>Value proposition yang kuat kepada end-user/consumer</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[5]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[5]->score}}">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Pasar(Market)</td>
										</tr>
										<tr>
											<td>g</td>
											<td>Mampu mengidentifikasi peluang pasar yang besar</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[6]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[6]->score}}">
											</td>
										</tr>
										<tr>
											<td>h</td>
											<td>Mampu mengidentikasi kebutuhan customer dengan tepat</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[7]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[7]->score}}">
											</td>
										</tr>
										<tr>
											<td>i</td>
											<td>Mampu menentukan target market dengan tepat</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[8]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[8]->score}}">
											</td>
										</tr>
										<tr>
											<td>j</td>
											<td>Mampu mengenali competitor</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[9]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[9]->score}}">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Strategi Bisnis</td>
										</tr>
										<tr>
											<td>k</td>
											<td>Business plan yang baik dan sustainable</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[10]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[10]->score}}">
											</td>
										</tr>
										<tr>
											<td>l</td>
											<td>Strategi penjualan dan marketing yang berkualitas</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[11]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[11]->score}}">
											</td>
										</tr>
										<tr>
											<td>m</td>
											<td>Melakukan financial forecast dan planning dengan benar</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[12]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[12]->score}}">
											</td>
										</tr>
										<tr>
											<td>n</td>
											<td>Mampu mengidentifikasi key risks/mitigations</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[13]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[13]->score}}">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Anggota Perusahaan</td>
										</tr>
										<tr>
											<td>o</td>
											<td>Perusahaan yang memiliki anggota yang solid yang memiliki kualifikasi dan kompetensi yang tepat untuk menjadikan bisnis ini sukses</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[14]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 20" min="1" max="20" value="{{$score[14]->score}}">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Daya Tarik (Traction)</td>
										</tr>
										<tr>
											<td>p</td>
											<td>Hasil/pekerjaan yang telah dilakukan hingga saat ini</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[15]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[15]->score}}">
											</td>
										</tr>
										<tr>
											<td>q</td>
											<td>Hasil penjualan, jumlah pelanggan/user, surat kerjasama, kemitraan</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[16]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25" value="{{$score[16]->score}}">
											</td>
										</tr>
										<tr>
											<td colspan="3" align="center">Poster</td>
										</tr>
										<tr>
											<td>r</td>
											<td>Poster yang dibuat mudah dimengerti oleh masyarakat</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[17]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" value="{{$score[17]->score}}">
											</td>
										</tr>
										<tr>
											<td>s</td>
											<td>Poster memberikan informasi yang berguna bagi masyarakat</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[18]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" value="{{$score[18]->score}}">
											</td>
										</tr>
										<tr>
											<td>t</td>
											<td>Poster bersifat persuasif/mengajak masyarakat sesuai dengan ide yang dituangkan di dalam poster</td>
											<td>
												<input type="hidden" name="form[]" value="{{$score[19]->part}}">
												<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15" value="{{$score[19]->score}}">
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