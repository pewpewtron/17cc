@extends('layout.dashboard-juri-template')

@section('title')
    Form Penilaian - ITCC 2018
@endsection

@section('content')
<div class="main-content">
	<div class="container-fluid">
		
		<div class="row">
			<center><h3>Data Karya Peserta</h3></center>
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
					<div class="panel-body">
						<table class="table table-striped">
							<tbody>
								<tr>
									<td>Nama Tim</td>
									<td>{{$score->file->group->group_name}}</td>
								</tr>
								<tr>
									<td>Nama Institusi</td>
									<td>{{$score->file->group->institution}}</td>
								</tr>
								<tr>
									<td>Judul Karya</td>
									<td>{{$score->file->title}}</td>
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

							@if($today==$final)
								<input type="hidden" name="stage" value="final">
							@else
								<input type="hidden" name="stage" value="elemination">
							@endif
						
							<input type="hidden" name="score_req_id" value="{{$score->id}}">
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
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35">
										</td>
									</tr>
									<tr>
										<td>b</td>
										<td>Kreativitas, inovasi dan ide usaha yang ditawarkan</td>
										<td>
											<input type="hidden" name="form[]" value="b">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 40" min="1" max="40">
										</td>
									</tr>
									<tr>
										<td>c</td>
										<td>Sistematika penyajian dan detail pembahasan secara keseluruhan</td>
										<td>
											<input type="hidden" name="form[]" value="c">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 35" min="1" max="35">
										</td>
									</tr>
									<tr>
										<td>d</td>
										<td>Memaparkan dengan jelas produk/layanan yang ditawarkan</td>
										<td>
											<input type="hidden" name="form[]" value="d">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>e</td>
										<td>Produk/layanan yang sangat menarik/atraktif/up-to-date</td>
										<td>
											<input type="hidden" name="form[]" value="e">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>f</td>
										<td>Value proposition yang kuat kepada end-user/consumer</td>
										<td>
											<input type="hidden" name="form[]" value="f">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">Pasar(Market)</td>
									</tr>
									<tr>
										<td>g</td>
										<td>Mampu mengidentifikasi peluang pasar yang besar</td>
										<td>
											<input type="hidden" name="form[]" value="g">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>h</td>
										<td>Mampu mengidentikasi kebutuhan customer dengan tepat</td>
										<td>
											<input type="hidden" name="form[]" value="h">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>i</td>
										<td>Mampu menentukan target market dengan tepat</td>
										<td>
											<input type="hidden" name="form[]" value="i">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>j</td>
										<td>Mampu mengenali competitor</td>
										<td>
											<input type="hidden" name="form[]" value="j">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">Strategi Bisnis</td>
									</tr>
									<tr>
										<td>k</td>
										<td>Business plan yang baik dan sustainable</td>
										<td>
											<input type="hidden" name="form[]" value="k">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>l</td>
										<td>Strategi penjualan dan marketing yang berkualitas</td>
										<td>
											<input type="hidden" name="form[]" value="l">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>m</td>
										<td>Melakukan financial forecast dan planning dengan benar</td>
										<td>
											<input type="hidden" name="form[]" value="m">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>n</td>
										<td>Mampu mengidentifikasi key risks/mitigations</td>
										<td>
											<input type="hidden" name="form[]" value="n">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">Anggota Perusahaan</td>
									</tr>
									<tr>
										<td>o</td>
										<td>Perusahaan yang memiliki anggota yang solid yang memiliki kualifikasi dan kompetensi yang tepat untuk menjadikan bisnis ini sukses</td>
										<td>
											<input type="hidden" name="form[]" value="o">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 20" min="1" max="20">
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">Daya Tarik (Traction)</td>
									</tr>
									<tr>
										<td>p</td>
										<td>Hasil/pekerjaan yang telah dilakukan hingga saat ini</td>
										<td>
											<input type="hidden" name="form[]" value="p">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td>q</td>
										<td>Hasil penjualan, jumlah pelanggan/user, surat kerjasama, kemitraan</td>
										<td>
											<input type="hidden" name="form[]" value="q">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 25" min="1" max="25">
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">Poster</td>
									</tr>
									<tr>
										<td>r</td>
										<td>Poster yang dibuat mudah dimengerti oleh masyarakat</td>
										<td>
											<input type="hidden" name="form[]" value="r">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
										</td>
									</tr>
									<tr>
										<td>s</td>
										<td>Poster memberikan informasi yang berguna bagi masyarakat</td>
										<td>
											<input type="hidden" name="form[]" value="s">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
										</td>
									</tr>
									<tr>
										<td>t</td>
										<td>Poster bersifat persuasif/mengajak masyarakat sesuai dengan ide yang dituangkan di dalam poster</td>
										<td>
											<input type="hidden" name="form[]" value="t">
											<input type="number" name="score[]" class="form-control" placeholder="Maks. 15" min="1" max="15">
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
@endsection