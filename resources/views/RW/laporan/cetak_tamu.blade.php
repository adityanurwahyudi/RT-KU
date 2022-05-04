<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Laporan Data Tamu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Tamu</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
                
							<th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Tanggal Masuk</th>
                            <th>Alamat Terdahulu</th>
                            <th>Alamat Terkini</th>
                            <th>Status Tinggal</th>
                            <th>RT</th>
                            <th>RW</th>
			</tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
                     @foreach($tamu as $p)s
                        <tr>
						<td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamatdahulu }}</td>
                            <td>{{ $p->alamatterkini }}</td>
                            <td>{{ $p->status }}</td>
                            <td>{{ $p->RT }}</td>
                            <td>{{ $p->RW }}</td>
                    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>