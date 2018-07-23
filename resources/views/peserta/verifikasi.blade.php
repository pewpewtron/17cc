@extends('layout.dashboard-template')

@section('title')
    Verifikasi - ITCC 2018
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
			<h3><center>Verifikasi</center></h3>
		</div>
	</div>

    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-cross"></i> <strong>{{ \Session::get('success') }}</strong>
    </div>
    @endif

	<div class="row">
		
		<div class="col-md-6">
			<div class="panel">
				<div class="panel">

					<div class="panel-heading">
						<h3 class="panel-title"><center>Upload Bukti Pembayaran</center></h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form action="{{url('verifikasi')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
							<div class="form-group">
								<label class="control-label col-md-3">Bukti Pembayaran</label>
								<div class="col-md-9">
									<input type="file" name="photo" class="form-control" accept="images/*">
									<small>Gambar dalam bentuk file .jpg</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Keterangan</label>
								<div class="col-md-9">
									<textarea class="form-control" name="note" placeholder="Input Keterangan"></textarea>
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
						<p style="text-align: justify; text-justify: inter-word;">Apakah data anda sudah terisi lengkap? Silahkan dilanjutkan dengan pembayaran pendaftaran lomba melalui ATM pada rekening <b>Nama Bank</b><i> no rekening a.n Nama Bendahara</i>.
							Nominal uang yang ditransfer adalah <b>Rp{{$biaya_baju+$biaya_pendaftaran}}</b></p>
						<p style="text-align: left">Rincian Biaya sebagai berikut :
							<ul>
								<li style="text-align: left">Biaya Pendaftaran Rp{{$biaya_pendaftaran}}</li>
								<li style="text-align: left">Baju Peserta Rp{{$biaya_baju}}</li>
							</ul>
						</p><br>
						<p><b>INGAT! Nominal harus sesuai dengan yang disebutkan diatas. Jika tidak, maka data tidak akan diproses.</b></p>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection