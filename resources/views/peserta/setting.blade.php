@extends('layout.dashboard-template')

@section('title')
    Setting - ITCC 2018
@endsection

@section('pesan')
@if(count($jumlahPesan)!=0)
	<span class="badge bg-danger">{{count($jumlahPesan)}}</span>
@endif
@endsection

@section('content')
<div class="container-fluid">

	@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> <strong>{{ \Session::get('success') }}</strong>
    </div>
    @elseif(\Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> <strong>{{ \Session::get('error') }}</strong>
    </div>
    @endif

	<div class="row">
		<div class="col-md-12">
			<h3><center>Setting</center></h3>
		</div>
	</div>

	<div class="row" style="margin-top: 30px;">
		<div class="col-md-6">
			<div class="panel">

				<div class="panel-heading">
					<h3 class="panel-title"><center>Ubah Password</center></h3>
					<div class="right">
						<button type="button" class="btn-toggle-collapse"><i class="fa fa-chevron-up"></i></button>
					</div>
				</div>
				<div class="panel-body">
					<form action="{{url('/change/password')}}" method="post" role="form">
						@csrf
						<div class="form-group row">
                            <label class="col-form-label col-md-3">Lama</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Kata Sandi Lama" name="passwordold" type="password">
                            </div>
                        </div>
						<div class="form-group row">
                            <label class="col-form-label col-md-3">Baru</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Kata Sandi Baru" name="password" type="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3">Konfirmasi Password</label>
                            <div class="col-md-9">
                                <input class="form-control" placeholder="Ulangi Kata Sandi Baru" name="password_confirmation" type="password">
                            </div>
                        </div>
						<button type="submit" class="btn btn-success">Ganti</button>

					</form>
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
						<p style="text-align: justify; text-justify: inter-word;">Apakah data anda sudah terisi lengkap? Silahkan dilanjutkan dengan pembayaran uang lomba dengan transfer ke rekening yang telah ditentukan. Lalu kirim bukti pembayarannya disini. Panitia akan segera memverifikasi data anda.</p>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
@endsection