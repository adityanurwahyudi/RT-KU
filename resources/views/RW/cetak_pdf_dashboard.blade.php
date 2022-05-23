<!DOCTYPE html>
<html>

<head>
    <!-- Favicons -->
    <link href="{{asset('/sbadmin/assets/img/pdf.png')}}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <title>Laporan Data Warga</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Data Warga</h4>
    </center>
    <table class="table table-bordered" style="width:100%;word-wrap: break-word" id="cetak-datatable">
        <thead>
            <tr>
                <th style="width:4%">No</th>
                <th style="width:10%">Nama</th>
                <th style="width:15%">Email</th>
                <th>Telpon</th>
                <th>NIK</th>
                <th>No KK</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Pekerjaan</th>
                <th>Status Menikah</th>
                <th>Kewarganegaraan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $val->name }}</td>
                <td>{{ $val->email }}</td>
                <td>{{ $val->telpon }}</td>
                <td>{{ $val->nik }}</td>
                <td>{{ $val->nokk }}</td>
                <td>{{ $val->agama }}</td>
                <td>{{ $val->jeniskelamin }}</td>
                <td>{{ $val->alamat }}</td>
                <td>{{ $val->tanggallahir }}</td>
                <td>{{ $val->usia }}</td>
                <td>{{ $val->pekerjaan }}</td>
                <td>{{ $val->statuspernikahan }}</td>
                <td>{{ $val->kewarganegaraan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>