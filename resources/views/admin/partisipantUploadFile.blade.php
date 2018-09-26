@extends('layout.dashboard-admin-template')

@section('title')
    Berkas Terupload
@endsection


@section('content')
<div class="container-fluid">
    <!-- OVERVIEW -->
    
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
                               <th>No</th>
                               <th>Nama Tim</th>
                               <th>Institusi</th>
                               <th>Email</th>
                               <th>Verif Email</th>
                               <th>Verif Panitia</th>
                               <th>Proposal</th>
                               <th>Video APK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($part as $key => $value)
                            	<tr>
                            		<td>{{ $key+1 }}</td>
                            		<td>{{ $value->group_name }}</td>
                            		<td>{{ $value->institution }}</td>
                            		<td>{{ $value->email }}</td>
                            		<td>{!! ($value->verified_email == 1) ? '<span class="label label-success">V</span>' : '<span class="label label-danger">BV</span>' !!}</td>
                            		<td>{!! ($value->verified == 1) ? '<span class="label label-success">V</span>' : '<span class="label label-danger">BV</span>' !!}</td>
                            		<td>
                            			@if ($value->proposalLink == null)
                            				Belum Upload
                            			@else
                            				<a href="{{ asset('berkas/'.$value->proposalLink) }}">{{ $value->title }}</a>
                            			@endif
                            		</td>
                            		<td>
                            			@if ($value->videoLink == null)
                            				Belum Upload
                            			@else
                            				<a href="{{ $value->videoLink }}">{{ $value->videoLink }}</a>
                            			@endif
                            		</td>
                            	</tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

