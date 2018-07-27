@extends('layout.dashboard-template')

@section('title')
    Upload Poster - ITCC 2018
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
					<h3 class="panel-title"><center>Upload Poster</center></h3>
				</div>
				<div class="panel-body">
					<div class="col-sm-12">
						@if(Auth::user()->poster != null)
							<div class="alert alert-success">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Terimakasih anda sudah mengunggah link Poster anda. Tunggu info lebih lanjut terkait hasil penilaian Poster anda. Anda dapat mengganti poster anda dengan melakukan hal yang sama sampai pada batas pengumpulan yang sudah ditentukan.</p>
								<p>Poster Anda adalah<br>
								<img src="{{ url($dir.'/'.Auth::user()->poster->file) }}" alt="" style="margin-top: 20px; max-width:500px; margin-bottom: 10px;"/>
								<br>
								diunggah pada <b>{{ date('d-m-Y H:i', strtotime(Auth::user()->poster->created_at)) }}</b></p>
							</div>
						@else
							<div class="alert alert-warning">
								<p style="font-weight: bold;">Hai, {{Auth::user()->group_name}}</p>
								<p style="text-align: justify; text-justify: inter-word;">Unggah Poster anda disini dengan format JPEG atau PNG. Poster ini akan digunakan untuk mencari Juara Favorit.</p>
							</div>
						@endif
					</div>
					<div class="col-sm-12">
						<form action="{{url('uploadPoster')}}" method="post" enctype="multipart/form-data">
	                    {{ csrf_field() }}
						
							<div class="form-group">
								<label class="control-label">Poster</label>
								<div class="">
									<input type="file" name="file" class="form-control" accept="images/*" id="imgInp">
								</div>
							</div>

							@if ($errors->has('file'))
                                <span class="invalid-feedback">
                                    <small style="color: red;">*{{ $errors->first('file') }}</small>
                                </span>
                            @endif
                            <img id="blah" src="#" alt="" style="margin-top: 20px; max-height: 500px; margin-bottom: 10px;"/><br><br>
							
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
@endsection