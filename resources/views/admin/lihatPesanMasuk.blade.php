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
			<div class="panel">
				<div class="panel-heading">
					<a href="/pesanAdmin" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-arrow-left"></i></a>
					<h3>Pesan Masuk</h3>
				</div>
				<div class="panel-body">
					<h3 class="panel-title">{{$pesan->subject}}</h3>
					<hr>
					<p>Diterima tanggal : {{date('d F Y', strtotime($pesan->created_at))}} | pukul : {{date('H:i', strtotime($pesan->created_at))}}</p>
					<p>Dari : {{$pesan->group->group_name}} | E-mail : {{$pesan->group->email}}</p>
					<p>Pesan : {{$pesan->message}}</p>

					<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalReply"><i class="fa fa-reply"></i></button>

					<!--Modal Tambah Pesan-->
				    <div class="modal fade" id="modalReply" role="dialog">
				        <div class="modal-dialog"> 
				            <!-- Modal content-->
				            <div class="modal-content">
				                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title"><center>Balas Pesan</center></h4>
				                </div>
				                <div class="modal-body">
				                    <form action="/pesanAdmin" method="post" class="form-horizontal" accept-charset="utf-8">
				                    	@csrf
				                    	<div class="form-group">
				                            <label class="control-label col-md-3">Penerima</label>
				                            <div class="col-md-9">
				                            	<input type="hidden" name="admin_id" value="{{Auth::user()->id}}">
				                            	<input type="hidden" name="group_id" value="{{$pesan->group_id}}">
				                                <input type="text" name="penerima" class="form-control" value="{{$pesan->group->email}}" disabled>
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <label class="control-label col-md-3">Subjek</label>
				                            <div class="col-md-9">
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
				</div>
			</div>
		</div>

		<div class="col-md-2 hidden-sm hidden-xs"></div>
	</div>

</div>

<script type="text/javascript">
	@if($errors->any())
 			$('#modalReply').modal('show');
 	@endif
</script>
@endsection