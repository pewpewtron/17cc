@extends('layout.dashboard-admin-template')

@section('title')
    Daftar Request Verifikasi - Admin
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
					<h3 class="panel-title">Pembayaran Peserta</h3>
				</div>

				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered data" id="example">
						<thead>
							<tr>
								<th>Nama Tim</th>
								<th>Instansi</th>
								<th>Nama Peserta</th>
								<th>Photo</th>
								<th>Biaya Pendaftaran (Rp)</th>
								<th>Biaya Baju (Rp)</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Nama Tim</td>
								<td>Instansi</td>
								<td>Nama Peserta</td>
								<td>Photo</td>
								<td>Biaya Pendaftaran (Rp)</td>
								<td>Biaya Baju (Rp)</tdh>
								<td>Total</td>
								<td><input type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalKonfir" value="Verifikasi"></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>

	</div>

	<!-- Modal Konfir -->
    <div id="modalKonfir" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Konfirmasi</center></h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin melakukan verifikasi?</p>
                </div>
                <div class="modal-footer">
                    <form method="post" action="#">
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal Konfir -->

</div>

@endsection