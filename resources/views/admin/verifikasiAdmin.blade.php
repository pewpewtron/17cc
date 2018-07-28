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
					<h3 class="panel-title">Daftar Request Verifikasi</h3>
				</div>

				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered data" id="example">
						<thead>
							<tr>
								<th>Nama Tim</th>
								<th>Instansi</th>
								<th>Biaya Pendaftaran (Rp)</th>
								<th>Biaya Baju (Rp)</th>
								<th>Total (Rp)</th>
								<th>Bukti Bayar</th>
								<th>Tanggal</th>
								<th>Note</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@unless(count($verif_reqs))
							<tr>
								<td colspan=9>Belum ada data</td>
							</tr>
							@endunless
							@foreach($verif_reqs as $verif_req)
							<tr>
								<td>{{$verif_req->group_name}}</td>
								<td>{{$verif_req->institution}}</td>
								<td>{{number_format($verif_req->regist_cost,2)}}</td>
								<td>{{number_format($verif_req->shirt_total,2)}}</td>
								<td>{{number_format($verif_req->regist_cost + $verif_req->shirt_total,2)}}</td>
								<td><button onclick="showImage(this)" type="button" class="btn btn-info btn-sm" data-url="{{asset($dir_file.'/'.$verif_req->filename)}}" data-toggle="modal" data-target="#modalGambar"><i class="glyphicon glyphicon-picture"></i></button></td>
								<td>{{$verif_req->created_at}}</td>
								<td>{{$verif_req->note}}</td>
								<td><input onclick="setConfirm(this)" type="button" class="btn btn-success btn-sm" data-id="{{$verif_req->group_id}}" data-toggle="modal" data-target="#modalKonfir" value="Verifikasi"></td>
							</tr>
                            @endforeach
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
                    <form method="post" action="{{url('admin/verif_group')}}">
					{{ csrf_field() }}
						<input id="group_id" type="hidden" name="group_id" />
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal Konfir -->

    <!-- Modal Gambar -->
    <div id="modalGambar" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Bukti Pembayaran</center></h4>
                </div>
                <div class="modal-body" id="verif_image">
                    <img src="{{asset('asset1/img/portfolio/card1.jpg')}}" style="width: 100%;">
                </div>
                <div class="modal-footer" style="background-color: #0575e6;">

                </div>
            </div>

        </div>
    </div>
    <!-- End Modal Gambar -->

</div>
<script>
	function setConfirm(e){
		group_id = $(e).attr('data-id');
		$('#group_id').val(group_id);
	}

	function showImage(e){
		url = $(e).attr('data-url');
		$('#verif_image').html(
			'<img src="'+ url +'" style="width: 100%;" alt="Verif Image" />'
		);
	}
</script>
@endsection