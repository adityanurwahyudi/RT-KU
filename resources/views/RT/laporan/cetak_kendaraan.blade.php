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

	<title>Laporan Data Warga Pemohon Kartu Akses Kendaraan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h5>Laporan Data Warga Pemohon Kartu Akses Kendaraan</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nopol</th>
                            <th>jenis Kendaraan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Alamat</th>
                            <th>Status Pengajuan</th>
			</tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
        @foreach($kendaraan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->nopol }}</td>
                            <td>{{ $p->jeniskendaraan }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->statuspermohonan }}</td>
    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>