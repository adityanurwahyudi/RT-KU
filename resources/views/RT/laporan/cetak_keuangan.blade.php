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
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                            <th>Bukti</th>
                            <th>Keterangan</th>
                            <th>Total Saldo</th>
                            </tr>
		</thead>
		<tbody>
				@php $no=1 @endphp
        @foreach($keuangan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>{{ $p->bulan }}</td>
                            <td>{{ $p->jumlah }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/keuangan/'.$p->bukti)}}"></td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->totalsaldo }}</td>
    </tr>
                    
			@endforeach
		</tbody>
	</table>

</body>
</html>