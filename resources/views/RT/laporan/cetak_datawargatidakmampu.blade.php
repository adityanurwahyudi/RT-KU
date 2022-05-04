<!DOCTYPE html>
<html>
<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<title>Laporan Data Warga Tidak Mampu</title>
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
		<h5>Laporan Data Warga Tidak Mampu</h4>
	</center>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                
		<thead>
			<tr>
            <th>No.</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Rank</th>
                            <th>Status</th>
			</tr>
		</thead>
		<tbody>
				@php $no_rank=1 @endphp
        @foreach($normalisasi as $key=>$val)
                        <tr>
                        <td>{{ $no_rank++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->rank }}</td>
                            <td>{{ $key+1 }}</td>
                             <td>
                                @if($val->rank > $kepentingan)
                                    <span class="badge badge-success">Layak</span>
                                @else
                                    <span class="badge badge-warning">Tidak Layak</span>
                                @endif
                            </td>
                    </tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>