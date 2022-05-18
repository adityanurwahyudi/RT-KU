<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Laporan Data Warga</title>
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
		<h5>Laporan Data Warga</h4>
	</center>
<table class="table table-striped table-bordered table-hover table-condensed" id="satu">
                
		<thead>
			<tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No KK</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Usia</th>
                            <th>Pekerjaan</th>
                            <th>Status Menikah</th>
                            <th>Kewarganegaraan</th>
                            <th>Foto Profile</th>
			</tr>
		</thead>
		<tbody>
				@php $i=1 @endphp
        @foreach($detail_users as $p)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nokk }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telpon }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>{{ $p->jeniskelamin }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->tanggallahir }}</td>
                            <td>{{ $p->usia }}</td>
                            <td>{{ $p->pekerjaan }}</td>
                            <td>{{ $p->statuspernikahan }}</td>
                            <td>{{ $p->kewarganegaraan }}</td>
                    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>