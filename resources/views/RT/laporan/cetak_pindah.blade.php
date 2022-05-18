<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Laporan Data Warga Pindah</title>
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
		<h5>Laporan Data Warga Pindah</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
                
                             <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Alamat Pindah</th>
                            <th>Keterangan Pindah</th>
			</tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
                     @foreach($pindah as $p)
                        <tr>
                        <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->alamatpindah }}</td>
                            <td>{{ $p->deskripsi }}</td>
                    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>