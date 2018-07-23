@extends('layout.dashboard-juri-template')

@section('title')
    Dashboard Juri - ITCC 2018
@endsection

@section('nav')
    <li class="hidden-lg"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: #021B79"><img class="img-circle" src="{{asset('asset/images/user.png')}}" width="30px" height="30px" alt="Avatar"> <span style="color: white">{{Auth::guard('jury')->user()->fullname}}</span></a></li>
    <li><a href="/juri"><i class="glyphicon glyphicon-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="/pesan"><i class="glyphicon glyphicon-envelope"></i> <span>Pesan</span> @if(count($pesan)==0)<span class="badge bg-danger" style="display: none;">{{count($pesan)}}</span> @else<span class="badge bg-danger">{{count($pesan)}}</span>@endif</a></li>
    <!--li><a href="/rekap-nilai"><i class="glyphicon glyphicon-list-alt"></i> <span>Detail Penilaian</span></a></li-->
    <li><a href="/rekap-nilai-detail"><i class="glyphicon glyphicon-list-alt"></i> <span>Rekap Nilai</span></a></li>
    <li><a href="/juriSetting"><i class="glyphicon glyphicon-cog"></i> <span>Setting</span></a></li>
    <li class="hidden-lg"><a href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i> <span>Log Out</span></a></li>
    <form id="logout-form" action="{{ url('juri/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">

        @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="fa fa-check"></i> <strong>{{ \Session::get('success') }}</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <!-- DATA ANGGOTA -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><center>Daftar Karya Peserta</center></h3>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table table-striped" id="example">
                            <thead>
                                <tr>
                                    <th>Instansi</th>
                                    <th>Tim</th>
                                    <th>Judul Ide</th>
                                    <th>Total Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                           <tbody>
                            @foreach($group as $tim)
                                <tr> 
                                    <td>{{$tim->institution}}</td>
                                    <td>{{$tim->group_name}}</td>
                                    <td>{{$tim->title}}</td>
                                    <td>{{$tim->total_nilai}}</td>
                                    <td>
                                        <a href="{{route('form-nilai.edit',$tim->id_score)}}" class="btn btn-warning btn-sm view" style="margin:2px;" data-toggle="tooltip" data-placement="right" title="Edit Nilai"><i class="glyphicon glyphicon-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END DATA ANGGOTA -->
            </div>
        </div>
    </div>                
</div>
<!-- END MAIN CONTENT -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
@endsection