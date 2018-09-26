<style type="text/css">
	table, th, td {
    border: 1px solid black;
}
</style>

<table>
	<thead>
		<tr>
			<th>No</th>
			<th>Lomba</th>
			<th>Terdaftar</th>
			<th>Verified Email</th>
			<th>Verified Admin</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($comp as $key => $value)
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value->long_name }}</td>
				<td style="text-align: center;">{{ $value->jml }}</td>
				<td style="text-align: center;">{{ $compVerifiedEmail[$key]->jml }}</td>
				<td style="text-align: center;">{{ $compVerifiedAll[$key]->jml }}</td>
			</tr>
		@endforeach
	</tbody>
</table>