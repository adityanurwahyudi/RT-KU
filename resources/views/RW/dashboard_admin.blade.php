@extends('template.backend.main1')

@section('css')
    <style>
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        .badge-success {
            color: #fff;
            background-color: #28a745;
        }
        .badge-warning {
            color: #212529;
            background-color: #ffc107;
        } 
        #datatable-users_wrapper .col-sm-12{
            overflow-x: auto;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Kependudukan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Data Kependudukan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kependudukan Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">   
            <a href=""  target="" id="setpdf" onclick="setPdf()" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
            <br><br>
                 <div class="d-flex flex-row align-items-center mb-4">
                    <div for="rt" class="form-outline flex-fill mb-0">
                        <label >RT:</label>
                            <select name="filter_rt" id="filter_rt">
                            <option value="">Semua</option>
                            @foreach($rt as $val)
                            <option value="{{ $val->rt }}">{{ $val->rt }}</option>
                            @endforeach
                            </select>
                         </div>
                    </div>
                    
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatable-users">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>Email</th>
                            <th>Telepon</th>
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
				
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan / Pelaporan Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatable-pengaduan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Telepon</th>
                            <th>Tanggal</th>
                            <th>Bukti</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
				
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kritik dan Saran Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatable-kritik">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Kritik dan Saran</th>
                        </tr>
                    </thead>
                    <tbody>
				
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Agama
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>Islam</th>
                            <th>Kristen Protestan</th>
                            <th>Katolik</th>
                            <th>Hindu</th>
                            <th>Buddha</th>
                            <th>Kong Hu Cu</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Kewarganegaraan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kewarganegaraan-table">
                    <thead>
                        <tr>
                            <th>Warga Negara Indonesia</th>
                            <th>Warga Negara Asing</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Status Pernikahan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="status-table">
                    <thead>
                        <tr>
                            <th>Menikah</th>
                            <th>Belum Menikah</th>
                            <th>Cerai</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Jumlah Data Warga Berdasarkan Usia
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="usia-table">
                    <thead>
                        <tr>
                            <th>0-10</th>
                            <th>10-25</th>
                            <th>25-40</th>
                            <th>40-60</th>
                            <th>60></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Jumlah Data Warga Berdasarkan Jenis Kelamin
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="jeniskelamin-table">
                    <thead>
                        <tr>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                        </tr>
                    </thead>
                    <tbody>
			
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function(){
        wargaBerdasarkanUsia();
        wargaBerdasarkanStatusPernikahan();
        wargaBerdasarkanJenisKelamin();
        wargaBerdasarkanAgama();
        setTable();
        setTablePengaduan();
        setTableKritik();
        wargaBerdasarkanKewarganegaraan();
        $('#filter_rt').change(function(){
            wargaBerdasarkanUsia();
            wargaBerdasarkanStatusPernikahan();
            wargaBerdasarkanJenisKelamin();
            wargaBerdasarkanAgama();
            wargaBerdasarkanKewarganegaraan();
            setTable();
            setTablePengaduan();
            setTableKritik();
        })
    });
    function setPdf(){
        var rt = ($('#filter_rt').val()) ? $('#filter_rt').val() : 0;

        $('#setpdf').attr("href", "{{ URL::to('RW/dashboard-rw/pdf-table/')}}"+'/'+rt);
        $('#setpdf').attr("target", "_blank");
    }
    function setTable()
    {
        var rt = $('#filter_rt').val();
        $.get("{{ URL::to('RW/dashboard-rw/table-warga-data') }}",{rt:rt}, function(res){
            var data = JSON.parse(res);
            var html = '';

            $.each(data, function(i ,val){
                var no = i + 1;
                var name = (val.name==null) ? '-' : val.name;
                var email = (val.email==null) ? '-' : val.email;
                var telpon = (val.telpon==null) ? '-' : val.telpon;
                var nik = (val.nik==null) ? '-' : val.nik;
                var nokk = (val.nokk==null) ? '-' : val.nokk;
                var agama = (val.agama==null) ? '-' : val.agama;
                var jeniskelamin = (val.jeniskelamin==null) ? '-' : val.jeniskelamin;
                var alamat = (val.alamat==null) ? '-' : val.alamat;
                var tanggallahir = (val.tanggallahir==null) ? '-' : val.tanggallahir;
                var usia = (val.usia==null) ? '-' : val.usia;
                var pekerjaan = (val.pekerjaan==null) ? '-' : val.pekerjaan;
                var statuspernikahan = (val.statuspernikahan==null) ? '-' : val.statuspernikahan;
                var kewarganegaraan = (val.kewarganegaraan==null) ? '-' : val.kewarganegaraan;
                html += '<tr>';
                    html += '<td>'+no+'</td>';
                    html += '<td>'+name+'</td>';
                    html += '<td>'+email+'</td>';
                    html += '<td>'+telpon+'</td>';
                    html += '<td>'+nik+'</td>';
                    html += '<td>'+nokk+'</td>';
                    html += '<td>'+agama+'</td>';
                    html += '<td>'+jeniskelamin+'</td>';
                    html += '<td>'+alamat+'</td>';
                    html += '<td>'+tanggallahir+'</td>';
                    html += '<td>'+usia+'</td>';
                    html += '<td>'+pekerjaan+'</td>';
                    html += '<td>'+statuspernikahan+'</td>';
                    html += '<td>'+kewarganegaraan+'</td>';
                html += '</tr>';
            })

            $('#datatable-users').DataTable().destroy();
            $('#datatable-users tbody').html(html);
            $('#datatable-users').DataTable();
        });
    }
    function setTablePengaduan()
    {
        var rt = $('#filter_rt').val();
        $.get("{{ URL::to('RW/dashboard-rw/table-warga-pengaduan') }}",{rt:rt}, function(res){
            var data = JSON.parse(res);
            var html = '';

            $.each(data, function(i ,val){
                var no = i + 1;
                var nama = (val.nama==null) ? '-' : val.nama;
                var telepon = (val.telepon==null) ? '-' : val.telepon;
                var deskripsi = (val.deskripsi==null) ? '-' : val.deskripsi;
                var tanggal = (val.tanggal==null) ? '-' : val.tanggal;
                var bukti = (val.bukti==null) ? '-' : val.bukti;
                
                var bkt = bukti.split(".");
                if(bkt[1] == 'mp4'){
                    var icon = '<i class="fa fa-video"></i>';
                }else{
                    var icon = '<i class="fa fa-image"></i>';
                }

                html += '<tr>';
                    html += '<td>'+no+'</td>';
                    html += '<td>'+nama+'</td>';
                    html += '<td>'+telepon+'</td>';
                    html += '<td>'+tanggal+'</td>';
                    html += '<td> <a href="{{url("upload/pengaduan")}}/'+bukti+'" class="btn btn-primary" >'+icon+'</a></td>';
                    html += '<td>'+deskripsi+'</td>';
                html += '</tr>';
            })

            $('#datatable-pengaduan tbody').html(html);
            $('#datatable-pengaduan').DataTable();
        });
    }
    function setTableKritik()
    {
        var rt = $('#filter_rt').val();
        $.get("{{ URL::to('RW/dashboard-rw/table-warga-kritik') }}",{rt:rt}, function(res){
            var data = JSON.parse(res);
            var html = '';

            $.each(data, function(i ,val){
                var no = i + 1;
                var nama = (val.nama==null) ? '-' : val.nama;
                var email = (val.email==null) ? '-' : val.email;
                var telepon = (val.telepon==null) ? '-' : val.telepon;
                var kritikdansaran = (val.kritikdansaran==null) ? '-' : val.kritikdansaran;

                html += '<tr>';
                    html += '<td>'+no+'</td>';
                    html += '<td>'+nama+'</td>';
                    html += '<td>'+email+'</td>';
                    html += '<td>'+telepon+'</td>';
                    html += '<td>'+kritikdansaran+'</td>';
                html += '</tr>';
            })

            $('#datatable-kritik tbody').html(html);
            $('#datatable-kritik').DataTable();
        });
    }

    function wargaBerdasarkanUsia(){
        var rt = $('#filter_rt').val();
        var html = '';
        $.get("{{ URL::to('RW/dashboard-rw/warga-berdasarkan-usia') }}",{rt:rt}, function(res){
            var data = JSON.parse(res)
            html +='<tr>';
            html +='<td>'+data.pertama+'</td>';
            html +='<td>'+data.kedua+'</td>';
            html +='<td>'+data.ketiga+'</td>';
            html +='<td>'+data.keempat+'</td>';
            html +='<td>'+data.kelima+'</td>';
            html +='</tr>';
            $('#usia-table tbody').html(html)
        })
    }
    function wargaBerdasarkanStatusPernikahan(){
        var rt = $('#filter_rt').val();
        var html = '';
        $.get("{{ URL::to('RW/dashboard-rw/warga-berdasarkan-status-pernikahan') }}",{rt:rt}, function(res){
            var data = JSON.parse(res)
            html +='<tr>';
            html +='<td>'+data.menikah+'</td>';
            html +='<td>'+data.belummenikah+'</td>';
            html +='<td>'+data.cerai+'</td>';
            html +='</tr>';
            $('#status-table tbody').html(html)
        })
    }
    function wargaBerdasarkanJenisKelamin(){
        var rt = $('#filter_rt').val();
        var html = '';
        $.get("{{ URL::to('RW/dashboard-rw/warga-berdasarkan-jenis-kelamin') }}",{rt:rt}, function(res){
            var data = JSON.parse(res)
            html +='<tr>';
            html +='<td>'+data.Lakilaki+'</td>';
            html +='<td>'+data.Perempuan+'</td>';
            html +='</tr>';
            $('#jeniskelamin-table tbody').html(html)
        })
    }
    function wargaBerdasarkanAgama(){
        var rt = $('#filter_rt').val();
        var html = '';
        $.get("{{ URL::to('RW/dashboard-rw/warga-berdasarkan-agama') }}",{rt:rt}, function(res){
            var data = JSON.parse(res)
            html +='<tr>';
            html +='<td>'+data.islam+'</td>';
            html +='<td>'+data.katholik+'</td>';
            html +='<td>'+data.protestan+'</td>';
            html +='<td>'+data.khonghucu+'</td>';
            html +='<td>'+data.hindu+'</td>';
            html +='<td>'+data.buddha+'</td>';
            html +='</tr>';
            $('#agama-table tbody').html(html)
        })
    }
    
function wargaBerdasarkanKewarganegaraan(){
        var rt = $('#filter_rt').val();
        var html = '';
        $.get("{{ URL::to('RW/dashboard-rw/warga-berdasarkan-kewarganegaraan') }}",{rt:rt}, function(res){
            var data = JSON.parse(res)
            html +='<tr>';
            html +='<td>'+data.WNI+'</td>';
            html +='<td>'+data.WNA+'</td>';
            html +='</tr>';
            $('#kewarganegaraan-table tbody').html(html)
        })
    }
    
</script>

@if(Session::has('success'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("success") }}',
            'success'
        )
    </script>
@endif
@if(Session::has('error'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("error") }}',
            'error'
        )
    </script>
@endif
@endsection
                