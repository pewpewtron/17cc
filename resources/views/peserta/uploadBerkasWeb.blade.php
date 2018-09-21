@extends('layout.dashboard-template')

@section('title')
    Upload Berkas Web - ITCC 2018
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
					<h3 class="panel-title"><center>Upload Bahan Web</center></h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-12">
						@if(Auth::user()->berkasWeb != null)
							<div class="alert alert-success">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Terimakasih anda sudah mengunggah berkas web anda. Tunggu info lebih lanjut terkait berkas web yang telah anda upload</p>
								<p>Proposal terakhir diunggah pada <b>{{ date('d-m-Y H:i', strtotime(Auth::user()->berkasWeb->created_at)) }}</b></p>
							</div>
						@else
							<div class="alert alert-warning">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Berkas web yang diunggah berformat RAR atau ZIP. Anda dapat menunggah ulang berkas web baru anda sampai batas waktu yang telah ditentukan dengan kembali mengunggah berkas baru baru di menu ini. <b>Pastikan kelengkapan data yang anda kirim.</b></p>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
						<form action="{{url('uploadBerkasWeb')}}" method="post" enctype="multipart/form-data">
	                    {{ csrf_field() }}

							<div class="form-group" style="margin-top: 20px;">
								<label class="control-label">Bahan Web</label>
								<small>*Berkas dalam bentuk file dengan ekstensi .rar atau .zip</small>
								<div class="">
									<input type="file" name="file" class="form-control" accept=".rar,.zip">
								</div>
							</div>

							@if ($errors->has('file'))
                                <span class="invalid-feedback">
                                    <small style="color: red;">*{{ $errors->first('file') }}</small>
                                </span>
                            @endif
                            
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