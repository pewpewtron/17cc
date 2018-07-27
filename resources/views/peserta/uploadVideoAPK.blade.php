@extends('layout.dashboard-template')

@section('title')
    Upload Video dan APK - ITCC 2018
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
					<h3 class="panel-title"><center>Upload Video dan APK</center></h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-12">
						@if(Auth::user()->videoapk != null)
							<div class="alert alert-info">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Terimakasih anda sudah mengunggah link Video dan APK karya anda. Tunggu info lebih lanjut terkait hasil penilaian anda. Anda dapat mengubah link anda dengan mengunggah ulang pada menu ini.</p>
								<p>Link anda adalah <a href="{{ Auth::user()->videoapk->link }}"><b>{{ Auth::user()->videoapk->link }}</b></a> diunggah pada <b>{{ date('d-m-Y H:i', strtotime(Auth::user()->videoapk->created_at)) }}</b></p>
							</div>
						@else
							<div class="alert alert-warning">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Unggah link Google Drive yang berisi Video dan APK karya anda disini. Anda dapat memperbaharui Video dan APK anda langsung di Google Drive. Panitia akan menggunakan Video dan APK terakhir yang diunduh bersamaan pada hari penutupan pengunggahan link. <b>Panitia tidak bertanggung jawab jika terjadi kesalahan tautan Video dan APK</b></p>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
						<form action="{{url('uploadVideoAPK')}}" method="post" enctype="multipart/form-data">
	                    {{ csrf_field() }}
						
							<div class="form-group">
								<label class="control-label">Tautan Google Drive</label>
								<div class="">
									<input type="text" class="form-control" name="link" required="" />
								</div>
							</div>

							@if ($errors->has('link'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                            @endif
							
							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection