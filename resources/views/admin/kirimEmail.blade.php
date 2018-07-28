@extends('layout.dashboard-admin-template')

@section('title')
  Kirim Email - ITCC 2018
@endsection


@section('content')
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs"></div>
		
		<div class="col-md-8">
			@foreach($errors->all() as $error)
			<ul>
				<div class="alert alert-danger">
					<li class="text-danger">{{$error}}</li>
				</div>
			</ul>
			@endforeach

			<div class="panel">
				<div class="panel-body">
					<div class="box" style="margin-top: 30px;">
						<div class="box-body">
							<div class="col-sm-12">
								@if (\Session::has('success'))
							        <div class="alert alert-success alert-dismissible" role="alert">
							            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							            <i class="fa fa-check"></i> <strong>{{ \Session::get('success') }}</strong>
							        </div>
							    @endif
								<form action="/kirimEmail" class="" method="post">
									{{ csrf_field() }}
									<div class="form-group">
									    <label for="tim">Nama Tim</label>
									    <select class="form-control" name="tim" required="">
									    	@foreach($groups as $group)
									    		<option value="{{ $group->id }}">{{ $group->group_name }}</option>
									    	@endforeach
									    </select>
									</div>

									<div class="form-group">
									    <label for="subjek">Subjek</label>
									    <input type="text" name="subjek" id="subjek" class="form-control" required="" placeholder="contoh: Kesalahan data diri peserta">
									</div>

									<div class="form-group">
									    <label for="msg">Pesan</label>
									    <textarea class="form-control" name="msg" id="msg" required="" rows="4"></textarea>
									</div>

									<button type="submit" class="btn btn-primary" style="margin-top: 10px;">Kirim</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>

		<div class="col-md-2 hidden-sm hidden-xs"></div>

	</div>

</div>
@endsection