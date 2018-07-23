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
					<h3 class="panel-title">Pesan Keluar</h3>
				</div>
				<div class="panel-body table-responsive">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah" style="margin-bottom: 20px;"><i class="glyphicon glyphicon-plus"></i></button>

					<table class="table table-striped" id="example">
						<thead>
							<tr>
								<th><center>No</center></th>
								<th><center>Admin</center></th>
								<th><center>Subjek</center></th>
								<th><center>Pesan</center></th>
								<th><center>Waktu</center></th>
								<th><center>Aksi</center></th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1 ?>
							@foreach($pesanKeluar as $pesan)
							<tr>
								<td><center>{{$i++}}</center></td>
								<td><center>{{$pesan->admin->privilege}}</center></td>
								<td><center>{{$pesan->subject}}</center></td>
								<td>
									<center>
										<a class="btn btn-sm btn-info" href="/pesanUserKeluarShow/{{$pesan->id}}"><i class="glyphicon glyphicon-eye-open"></i></a>
									</center>
								</td>
								<td><center>{{date('d F Y H:i', strtotime($pesan->created_at))}}</center></td>
								<td>
									<center>
										<a onclick="del_participant(this)" data-post="{{ url('/pesanUserKeluar', ['id' => $pesan->id]) }}" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete"><i class="glyphicon glyphicon-trash"></i></a>
									</center>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>

	<!--Modal Tambah Pesan-->
    <div class="modal fade" id="modalTambah" role="dialog">
        <div class="modal-dialog"> 
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Kirim Pesan</center></h4>
                </div>
                <div class="modal-body">
                    <form action="/pesanUser" method="post" class="form-horizontal" accept-charset="utf-8">
                    	@csrf
                    	<div class="form-group" id="penerima">
                            <label class="control-label col-md-3">Ke</label>
                            <div class="col-md-9">
                            	<select name="admin_id" class="form-control" id="penerima">
                            		<option disabled selected>Pilih Penerima</option>
                                    @foreach($penerima as $p)
                                    	<option value="{{$p->id}}">{{$p->privilege}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('admin_id'))
									<div class="alert alert-danger">
										<span class="text-danger">{{ $errors->first('admin_id') }}</span>
									</div>
								@endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Subjek</label>
                            <div class="col-md-9">
                            	<input type="hidden" name="group_id" value="{{Auth::user()->id}}">
                                <input type="text" name="subject" class="form-control" placeholder="Subjek">
                                @if($errors->has('subject'))
									<div class="alert alert-danger">
										<span class="text-danger">{{ $errors->first('subject') }}</span>
									</div>
								@endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Pesan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="message" placeholder="pesan"></textarea>
                                @if($errors->has('message'))
									<div class="alert alert-danger">
										<span class="text-danger">{{ $errors->first('message') }}</span>
									</div>
								@endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-send"></i> Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Tambah Pesan-->

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

    @if($errors->any())
 		$('#modalTambah').modal('show');
 	@endif
</script>
@endsection