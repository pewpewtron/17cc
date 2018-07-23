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
    				<h3 class="panel-title">Kelola Kompetisi</h3>
    			</div>

    			<div class="panel-body table-responsive">
    				<table class="table table-striped" id="example">
    					<tr>
    						<td class="col-md-3">Kode Kompetisi</td>
    						<td>{{$kompetisi->id}}</td>
    					</tr>
    					<tr>
    						<td class="col-md-3">Nama Singkat</td>
    						<td>{{$kompetisi->short_name}}</td>
    					</tr>
    					<tr>
    						<td class="col-md-3">Nama Lengkap</td>
    						<td>{{$kompetisi->long_name}}</td>
    					</tr>
    					<tr>
    						<td class="col-md-3">Biaya Pendaftaran</td>
    						@if($kompetisi->regist_cost==0)
    							<td>{{'Belum Ditentukan'}}</td>
    						@else
    							<td>{{$kompetisi->regist_cost}}</td>
    						@endif
    					</tr>
    					<tr>
    						<td class="col-md-3">Deskripsi</td>
    						@if($kompetisi->description==null)
    							<td>{{'Belum Diisi'}}</td>
    						@else
    							<td>{{$kompetisi->description}}</td>
    						@endif
    					</tr>
    				</table>

    				<button style="margin-top: 20px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEdit"><i class="glyphicon glyphicon-edit"></i> Edit</button>
    			</div>

    		</div>
    	</div>
    </div>

    <!--Modal Tambah Anggota-->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog"> 
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><center>Edit Data Kompetisi</center></h4>
                </div>
                <div class="modal-body">
                    <form action="/simpanKompetisi/{{$kompetisi->id}}" method="post" class="form-horizontal" accept-charset="utf-8">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <label class="control-label col-md-3">Kode Kompetisi</label>
                            <div class="col-md-9">
                                <input type="text" name="kode_kompetisi" class="form-control" value="{{$kompetisi->id}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Singkat</label>
                            <div class="col-md-9">
                                <input class="form-control" type="text" name="short_name" value="{{$kompetisi->short_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input class="form-control" name="long_name" type="text" value="{{$kompetisi->long_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Biaya Pendaftaran</label>
                            <div class="col-md-9">
                                <input class="form-control" name="regist_cost" type="text" value="{{$kompetisi->regist_cost}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Deskripsi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description">{{$kompetisi->description}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End Modal Tambah Anggota-->

</div>
@endsection