<html>

<head>
    <style>
        .float-right {
            float: right !important;
        }

        .width-100 {
            width: 100% !important;
        }

        .width-50 {
            width: 50% !important;
        }

        .txt-center {
            text-align: center !important;
        }

        #title {}

        #title h1 {
            float: left;
            margin: 0px;
            text-align: center;
        }

        .kop {
            font-size: 20px;
        }

        #detail {
            font-size: 20px !important;
        }

        #detail table td {
            padding: 10px !important;
        }

        .txt-center {
            text-align: center !important;
        }

        .ses-style {
            border: 1px solid black;
            padding: 7px;
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <!-- <body> -->
    <center>
        <span style="font-size: 17px;"><b>PEMERINTAH KABUPATEN BOGOR</b></span><br>
        <span style="font-size: 17px;"><b>DESA KADUMANGGU, KECAMATAN BABAKAN MADANG</b></span><br>
        <span style="font-size: 17px;"><b> RT {{ $ttd->rt }} RW {{ $ttd->rw }} </b></span><br>
    </center>
    <br>
    <hr style="border:1px solid #000;">
    <br>
    <table border="0" style="width: 100%; font-size: 17px;">
        <tr>
            <td align="center" style="font-weight: bold;"><u>SURAT PENGANTAR</u></td>
        </tr>
    </table>
    <table border="0" style="width: 100%; font-size: 14px;">
        <tr>
            <td align="center" style="font-weight: bold;">No. {{ $ttd->rt }}/{{ $ttd->rw }}/SKD/</td>
        </tr>
    </table>
    <br>
    <table border="0" style="width: 100%;">
        <span>
            Yang bertanda tangan dibawah ini Pengurus RT. {{ $ttd->rt }} / RW. {{ $ttd->rw }}  Desa Kadumanggu, Kecamatan Babakan Madang, Kabupaten Bogor, Menerangkan Bahwa :
        </span>
    </table>
    <br><br>
    <table border="0" style="width: 100%;">
        {{-- <tr>
				<td width="50%">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="35%">Nama</td>
							<td width="65%">: </td>
						</tr>
					</table>
				</td>
				<td width="50%">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="35%">Tkt. Keamanan</td>
							<td width="65%">: </td>
						</tr>
					</table>
				</td>
			</tr> --}}
        <tr>
            <td colspan="2">
                <table border="0" style="width: 100%;">
                    <tr>
                        <td width="25%">Nama Lengkap </td>
                        <td width="75%" style="vertical-align: top;">: {{ $surat->nama }}</b></td>
                    </tr>
                    <tr>
                        <td width="25%">Jenis Kelamin</td>
                        <td width="75%" style="vertical-align: top;">: {{ $surat->jenis_kelamin }}</b></td>
                    </tr>
                    <tr>
                        <td width="25%">Tempat / Tanggal Lahir</td>
                        <td width="75%" style="vertical-align: top;">: {{ $surat->tempat_lahir }} / {{ $surat->tgl_lahir }}</b></td>
                    </tr>
                    <tr>
                        <td width="25%">Pekerjaan</td>
                        <td width="75%" style="vertical-align: top;">: {{ $surat->pekerjaan }}</b></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td style="vertical-align: top;">: {{ $surat->agama }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td style="vertical-align: top;">: {{ $surat->alamat }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table border="0" style="width: 100%;">
        <span>
           Adalah benar nama tersebut diatas adalah warga masyarakat RT {{ $ttd->rt }} RW {{ $ttd->rw }} Desa Kadumanggu Kecamatan Babakan Madang Kabupaten Bogor.
           <br> Demikian surat pengantar ini dipergunakan untuk membuat:
           <br>
           {{ $surat->keperluan }}
        </span>
    </table>
    <br><br><br>
    <table border="0" style="width: 100%;">
        <tr>
            <td align="center">
                <span style="float: right;">Kadumanggu, {{date('d F Y')}}</span>
                <br>
                <span style="float: right;padding-top: 10px;">KETUA RT {{ $ttd->rt }} / {{ $ttd->rw }}</span>
                <br><br><br>
                <div width="40%" style="float: right;">
                    <img src="{{url('/upload/tanda_tangan/'.$ttd->tanda_tangan.'')}}" alt="Tanda Tangan"
                        style="position:absolute;padding-right:15px;height:100px;width:100px;z-index:1;">
                    <img src="{{url('/upload/stempel/'.$ttd->stempel.'')}}" alt="Tanda Tangan"
                        style="position:relative;padding-right:15px;height:100px;width:100px;">
                    <br>
                    <span style="padding-right:-10px;">{{ $ttd->name }}</span>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>