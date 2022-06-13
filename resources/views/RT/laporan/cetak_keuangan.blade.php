<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Laporan Data Keuangan Kas Bendahara</title>
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
		<h5>Laporan Data Keuangan Kas Bendahara</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
            
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Rincian</th>
                            <th>Jenis Keterangan</th>
                            <th>Jumlah</th>
                            <th>Bukti</th>
                            <th>Total Saldo</th>
                            </tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
        @foreach($keuangan as $p)
                        <tr>
                        <td>{{ $no++ }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->jenis }}</td>
                            <td>{{ number_format($p->jumlah,3,',','.') }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/keuangan/'.$p->bukti)}}"></td>
                            <td>{{ number_format($p->totalsaldo,3,',','.') }}</td>
    </tr>
                    
			@endforeach
		</tbody>
	</table>

</body>
</html>