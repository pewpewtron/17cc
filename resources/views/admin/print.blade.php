<!DOCTYPE html>
<html>
<head>
	<title>Daftar Peserta {{ Auth::user()->competition->long_name }}</title>
	<style type="text/css">
		.body{
			width: 100%;
		}

		.kop{
			text-align: center;
		}
		.container{
			margin-left: 50px;
			margin-right: 50px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}

		table, th, td {
			border: 1px solid black;
			padding: 5px;
		}

		.no-border > td{
			border: none;
		}

		.no-border{
			border: none;
			width: 100%;
		}

		.coret{
			text-decoration: line-through;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="kop">
			<h2>DAFTAR PESERTA CABANG LOMBA</h2>
			<h4>{{ Auth::user()->competition->long_name }}</h4>
		</div>
		
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Peserta</th>
					@if(Auth::user()->competition_id != 1 && Auth::user()->competition_id != 2)
					<th>Nama Peserta</th>
					@endif
					<th>Nama Tim</th>
					<th>Instansi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($participants as $key => $val)
					<tr>
						<td>{{ $key+1 }}</td>
						<td>{{ $val->code }}</td>
						<td>{{ $val->full_name }}</td>
						@if(Auth::user()->competition_id != 1 && Auth::user()->competition_id != 2)
						<td>{{ $val->group_name }}</td>
						@endif
						<td>{{ $val->institution }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>