<!DOCTYPE html>
<html>
<head>
 
<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
       <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Data Pengaduan / Pelaporan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h5>Data Pengaduan / Pelaporan</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
                             <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
        @foreach($pengaduan as $p)
                        <tr>
                        <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->bukti }}</td>
                            <td>{{ $p->deskripsi }}</td>
    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>