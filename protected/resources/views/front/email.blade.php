<center><h2>{{$perihal}}</h2></center>
<hr>
<table>
	@if(!empty($firstname))
	<tr>
		<td>Nama </td>
		<td>: </td>
		<td> {{ $firstname }} {{ $lastname }}</td>
	</tr>
	@else
	@endif
	<tr>
		<td>Email </td>
		<td>: </td>
		<td> {{ $email }}</td>
	</tr>
	<tr>
		<td>Pengaduan Masyarakat </td>
		<td>: </td>
		<td> {{ $msg }}</td>
	</tr>
</table>