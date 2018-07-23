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
		<div class="col-md-2 hidden-sm hidden-xs"></div>
		
		<div class="col-md-8">
			@foreach($errors->all() as $error)
			<ul>
				<div class="alert alert-danger">
					<li class="text-danger">{{$error}}</li>
				</div>
			</ul>
			@endforeach

			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><center>Form Pendaftaran Juri</center></h3>
				</div>
				<div class="panel-body">
					<div class="box" style="margin-top: 30px;">
						<div class="box-body">
							<form action="/tambahJuriSimpan" class="form-horizontal" method="post">
								@csrf
								<div style="border-style: solid; border-width: 1px; padding: 8px 8px;">
									<h4><center>Data Diri</center></h4>

									<div class="form-group">
										<label class="control-label col-md-3">Nama Lengkap</label>
										<div class="col-md-9">
											<input type="text" name="fullname" class="form-control" placeholder="ex. 'Nama Brata'">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">E-Mail</label>
										<div class="col-md-9">
											<input type="email" name="email" class="form-control" placeholder="ex. 'mail@site.com'">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Kategori Lomba</label>
										<div class="col-md-9">
											<select name="competition_id" class="form-control">
												<option value="#" disabled selected="">Kategori Lomba</option>
												@if(Auth::user()->competition_id==4)
												<option value="4">IDEA</option>
												@elseif(Auth::user()->competition_id==5)
												<option value="5">SI</option>
												@endif
											</select>
										</div>
									</div>

								</div>

								<div style="border-style: solid; border-width: 1px; padding: 8px 8px; margin-top: 20px;">
									<h4><center>Data Autentikasi</center></h4>

									<div class="form-group">
										<label class="control-label col-md-3">Username</label>
										<div class="col-md-9">
											<input type="text" name="username" class="form-control" placeholder="nama pengguna">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Password</label>
										<div class="col-md-9">
											<input type="password" name="password" class="form-control" placeholder="kata sandi">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Konfirmasi Password</label>
										<div class="col-md-9">
											<input type="password" name="password_confirmation" class="form-control" placeholder="ulangi kata sandi">
										</div>
									</div>

								</div>

								<button type="submit" class="btn btn-primary btn-block" style="margin-top: 10px;">Daftar</button>

							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<div class="col-md-2 hidden-sm hidden-xs"></div>

	</div>

</div>
@endsection