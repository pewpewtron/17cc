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
    <!-- OVERVIEW -->

    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> <strong>{{ \Session::get('success') }}</strong>
    </div>
    @endif
    
    <!-- END OVERVIEW -->
    <div class="row">
        <div class="col-md-12">
            <!-- DATA ANGGOTA -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><center>Data Peserta</center></h3>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                               <th>Kode</th>
                               <th>Nama</th>
                               <th>Tim</th>
                               <th>Foto</th>
                               <th>Instansi</th>
                               <th>Email</th>
                               <th>Kontak</th>
                               <th>Veget</th>
                               <th>Baju</th>
                               <th>Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participant as $peserta)
                            <tr>
                                @if($peserta->code==null)
                                <td>{{'-'}}</td>
                                @else
                                <td>{{$peserta->code}}</td>
                                @endif
                                <td>{{$peserta->full_name}}</td>
                                <td>{{$peserta->group_name}}</td>
                                <td><a class="btn btn-info btn-sm view" style="margin:2px;" data-toggle="modal" data-target="#modal-foto{{$peserta->id}}" type="button"><i class="glyphicon glyphicon-picture"></i></a></td>
                                <!-- Modal Foto -->
                                <div id="modal-foto{{$peserta->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #0575e6; color: #fff;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><center>Kartu Identitas Peserta</center></h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{asset('uploads\\identitas\\'.$peserta->photo)}}" style="width: 100%" />
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Modal Foto -->
                                <td>{{$peserta->institution}}</td>
                                <td>{{$peserta->email}}</td>
                                <td>{{$peserta->contact}}</td>
                                <td>@if($peserta->vegetarian==0)<b class='label label-danger'>Tidak veget</b>@else<b class='label label-success'>Veget</b>@endif
                                </td>
                                <td>@if($peserta->buy_shirt==0)<b class='label label-danger'>Tidak</b>@else<b class='label label-success'>Ya</b>@endif</td>
                                <td align="center">
                                    @if($peserta->verified==1)
                                    Terverifikasi <i title='Sudah Terverifikasi' class='glyphicon glyphicon-ok' style='color:green'></i>
                                    @else
                                    Belum Terverifikasi <i title='Belum Terverifikasi' class='glyphicon glyphicon-remove' style='color:red'></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DATA ANGGOTA -->
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title"><center>Rekapan</center></h4>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               <th>Berdasarkan</th>
                               <th width="50px"><small class="pull-right">Jumlah</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jumlah Peserta</td>
                                <td><small class="pull-right">{{count($jumlahPeserta)}}</small></td>
                            </tr>
                            <tr>
                              <td>Jumlah Tim</td>
                              <td><small class="pull-right">{{count($jumlahTim)}}</small></td>
                            </tr>
                            <tr>
                                <td>Jumlah Peserta Non Veget</td>
                                <td>@if(count($jumlahNonVeget)==null)<small class="pull-right">0</small>@else<small class="pull-right">{{count($jumlahNonVeget)}}</small>@endif</td>
                            </tr>
                            <tr>
                                <td>Jumlah Peserta Veget</td>
                                <td>@if(count($jumlahVeget)==null)<small class="pull-right">0</small>@else<small class="pull-right">{{count($jumlahVeget)}}</small>@endif</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-sm-12" style="margin-top: 20px;">
                        <form action="{{ route('admin.cetakpeserta') }}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Print Data Peserta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

