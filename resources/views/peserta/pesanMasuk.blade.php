@extends('layout.dashboard-template')

@section('title')
    Dashboard - ITCC 2018
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
    @endif
	
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Pesan Masuk</h3>
				</div>
				<div class="panel-body table-responsive">
					<!--button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah" style="margin-bottom: 20px;"><i class="glyphicon glyphicon-plus"></i></button>
					<!--Modal Tambah Pesan-->
				    <!--div class="modal fade" id="modalTambah" role="dialog">
				        <div class="modal-dialog"--> 
				            <!-- Modal content-->
				            <!--div class="modal-content">
				                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title"><center>Kirim Pesan</center></h4>
				                </div>
				                <div class="modal-body">
				                    <form action="#" method="post" class="form-horizontal" accept-charset="utf-8">
				                    	<div class="form-group">
				                            <label class="control-label col-md-3">Pengirim</label>
				                            <div class="col-md-9">
				                                <input type="text" name="penerima" class="form-control" placeholder="Subjek" disabled>
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label col-md-3">Subjek</label>
				                            <div class="col-md-9">
				                                <input type="text" name="subject" class="form-control" placeholder="Subjek">
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label col-md-3">Pesan</label>
				                            <div class="col-md-9">
				                                <textarea class="form-control" name="message" placeholder="pesan"></textarea>
				                            </div>
				                        </div>
				                        <div class="modal-footer">
				                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Kirim</button>
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>
				    </div-->
				    <!--End Modal Tambah Pesan-->

					<table class="table table-striped" id="example">
						<thead>
							<tr>
								<th>#</th>
								<th>Subjek</th>
								<th>Pesan</th>
								<th>Waktu</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1?>
							@foreach($pesanMasuk as $pesan)
							<tr>
								<td>
								@if($pesan->view==0)
								{{$i++}} <span class="badge bg-warning"><i class="glyphicon glyphicon-flag"></i></span>
								@else
								{{$i++}}
								@endif
								</td>
								<td>{{$pesan->subject}}</td>
								<td>
									<form action="/pesanUser/{{$pesan->id}}" method="post">
										@csrf
										{{method_field('PUT')}}
										<input type="hidden" name="view" value="1">
										<button class="btn btn-info btn-sm" type="submit"><i class="glyphicon glyphicon-eye-open"></i></button>
									</form>	
								</td>
								<td>{{date('d F Y H:i', strtotime($pesan->created_at))}}</td>
								<td>
									<!--button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalReply"><i class="fa fa-reply"></i></button-->

									<a onclick="del_participant(this)" data-post="{{ url('/pesanUser', ['id' => $pesan->id]) }}" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete"><i class="glyphicon glyphicon-trash"></i></a>
								</td>

								<!--Modal Balas Pesan-->
							    <div class="modal fade" id="modalReply" role="dialog">
							        <div class="modal-dialog"> 
							            <!-- Modal content-->
							            <div class="modal-content">
							                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                    <h4 class="modal-title"><center>Balas Pesan</center></h4>
							                </div>
							                <div class="modal-body">
							                    <form action="/pesanUser" method="post" class="form-horizontal" accept-charset="utf-8">
							                    	<div class="form-group col-md-12">
							                            <label class="control-label col-md-3">Pengirim</label>
							                            <div class="col-md-9">
							                                <input type="text" name="penerima" class="form-control" value="{{$pesan->admin->email}}" disabled>
							                                <input type="text" name="admin_id" value="{{$pesan->admin->id}}">
							                                <input type="" name="">
							                            </div>
							                        </div>
							                        <div class="form-group col-md-12">
							                            <label class="control-label col-md-3">Subjek</label>
							                            <div class="col-md-9">
							                                <input type="text" name="subject" class="form-control" placeholder="Subjek">
							                            </div>
							                        </div>
							                        <div class="form-group col-md-12">
							                            <label class="control-label col-md-3">Pesan</label>
							                            <div class="col-md-9">
							                                <textarea class="form-control" name="message" placeholder="pesan"></textarea>
							                            </div>
							                        </div>
							                        <div>
							                        	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="glyphicon glyphicon-remove" style="display: inline-block;"></i></button>
							                            <button type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-send"></i></button>
							                        </div>
							                    </form>
							                </div>
							            </div>
							        </div>
							    </div>
							    <!--End Modal Balas Pesan-->
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

	<!-- Modal Delete -->
	<div id="modalDelete" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" style="background-color: #0575e6; color: #fff;">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><center>Konfirmasi</center></h4>
				</div>
				<div class="modal-body">
				    <p>Apakah anda yakin ingin menghapus data ini?</p>
				</div>
				<div class="modal-footer">
					<form id="formDelete" method="post" action="#">
					    <input type="hidden" name="_method" value="delete" />
					    {!! csrf_field() !!}
					    <button type="submit" class="btn btn-danger">Ya</button>
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- End Modal Delete -->

</div>

<script type="text/javascript">
	function del_participant(e){
        post = $(e).attr('data-post');
        $('#formDelete').attr('action', post);
        $('#modalDelete').show();
    }
</script>
@endsection