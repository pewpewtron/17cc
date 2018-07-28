@extends('layout.dashboard-template')

@section('title')
    Upload Data - ITCC 2018
@endsection

@section('pesan')
@if(count($jumlahPesan)!=0)
	<span class="badge bg-danger">{{count($jumlahPesan)}}</span>
@endif
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title"><center>Upload Proposal</center></h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-12">
						@if(Auth::user()->file != null)
							<div class="alert alert-success">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Terimakasih anda sudah mengunggah berkas proposal anda. Tunggu info lebih lanjut terkait hasil penilaian proposal anda.</p>
								<p>Proposal terakhir diunggah pada <b>{{ date('d-m-Y H:i', strtotime(Auth::user()->file->created_at)) }}</b></p>
							</div>
						@else
							<div class="alert alert-warning">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Proposal yang diunggah berformat PDF. Anda dapat menunggah ulang Proposal baru anda sampai batas waktu yang telah ditentukan dengan kembali mengunggah berkas proposal baru di menu ini. <b>Pastikan kelengkapan data yang anda kirim.</b></p>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
						<form action="{{url('upload')}}" method="post" enctype="multipart/form-data">
	                    {{ csrf_field() }}
						
							<div class="form-group">
								<label class="control-label">Judul Karya</label>
								<div class="">
									<input type="text" class="form-control" name="title" value="{{ (Auth::user()->file != null) ? Auth::user()->file->title : '' }}" />
								</div>
							</div>

							<div class="form-group" style="margin-top: 20px;">
								<label class="control-label">Berkas Lomba</label>
								<small>*Berkas dalam bentuk file PDF</small>
								<div class="">
									<input type="file" name="file" class="form-control" accept=".pdf">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Keterangan</label>
								<div class="">
									<textarea class="form-control" name="etc" placeholder="tulis keterangan tambahan yang ingin anda sampaikan. kosongkan jika tidak perlu"></textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection