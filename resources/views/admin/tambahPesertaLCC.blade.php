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
		<div class="col-md-1 hidden-sm hidden-xs"></div>
		<div class="col-md-10">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><center>Tambah Peserta LCC</center></h3>
				</div>
				<div class="panel-body">
					<div class="box" style="margin-top: 30px;">
						<div class="box-body">
							<form action="/simpanPeserta" class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
								<div style="border-style: solid; border-width: 1px;padding: 8px 8px;">
									<h4><center>Data Tim</center></h4>

									<div class="form-group">
                             			<label class="control-label col-md-3">Nama Tim</label>
				                        <div class="col-md-9">
				                            <input class="form-control" placeholder="ex. 'Team Greentea'" name="groupname" type="text">
				                        </div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Asal Sekolah</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ex. 'SMA/SMK Permata'" name="institution" type="text">
                             			</div>
                           			</div>
									
								</div>

								<div style="border-style: solid; border-width: 1px;padding: 8px 8px;margin-top: 20px;">
									<h4><center>Data Ketua Tim</center></h4>
                  <input type="hidden" name="buy_shirt" value="0">

                           			<div class="form-group">
                             			<label class="control-label col-md-3">Nama Lengkap</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ex. 'Nama Brata'" name="fullname" required="required" type="text">
                             			</div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Tanggal Lahir</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ex. '1995/12/27'" name="birthday" required="required" type="date" >
                             			</div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Email</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ex. 'mail@site.com'" name="email" required="required" type="email">
                             			</div>
                           			</div>
                           			<div class="form-group">
                            			<label class="control-label col-md-3">Nomor Kontak</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ex. '081632111111'" name="contact" required="required" type="number" >
                             			</div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Vegetarian</label>
                             			<div class="col-md-9">
                                			<label><input type="radio" value="1" name="vegetarian" required="required"> Ya </label> <label><input type="radio" value="0" name="vegetarian" required="required"> Tidak</label>
                             			</div>
                           			</div>
                           			<div class="form-group">
                              			<label class="control-label col-md-3">Kartu Identitas</label>
                              			<div class="col-md-9">
                                  			<input name="photo" type="file" class="form-control" accept="image/*">
                                  			<small>Gambar dalam bentuk file .jpg</small>
                              			</div>
                            		</div>

								</div>

								<div style="border-style: solid; border-width: 1px;padding: 8px 8px; margin-top: 20px;">
									<h4><center>Data Autentikasi</center></h4>

									<div class="form-group">
                             			<label class="control-label col-md-3">Username</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="nama pengguna" name="username" required="required" type="text">
                             			</div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Password</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="kata sandi" name="password" id="pass" required="required" type="password">
                             			</div>
                           			</div>
                           			<div class="form-group">
                             			<label class="control-label col-md-3">Konfirmasi Password</label>
                             			<div class="col-md-9">
                                 			<input class="form-control" placeholder="ulangi kata sandi" name="password_confirmation" id="pass2nd" required="required" type="password">
                                 			<!--span id='message'></span-->
                             			</div>
									</div>

								</div>

								<button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Daftar</button>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-md-1 hidden-sm hidden-xs"></div>
	</div>

</div>
@endsection