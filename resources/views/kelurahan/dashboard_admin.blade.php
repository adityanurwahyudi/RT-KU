@extends('template.backend.main2')

@section('css')
    <style>
        .highcharts-credits{
            display:none;
        }
        #datatable-users_wrapper .col-sm-12{
            overflow-x: auto;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard Kelurahan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard Kelurahan</li>
    </ol>
    <div class="row" style="display:none;">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Primary Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Warning Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Success Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <label>RW</label>
            <select name="rw" id="rw" class="form-control filterData">
                <option value="">Semua</option>
                @foreach($rw as $val)
                <option value="{{ $val->rw }}">{{ $val->rw }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xl-6">
            <label>RT</label>
            <select name="rt" id="rt" class="form-control filterData">
                <option value="">Semua</option>
                @foreach($rt as $val)
                <option value="{{ $val->rt }}">{{ $val->rt }}</option>
                @endforeach
            </select>
        </div>
        <br><br><br>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-columns me-1"></i>
                    Jenis Kelamin
                </div>
                <div class="card-body">
                    <div id="jeniskelamin-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-columns me-1"></i>
                    Agama
                </div>
                <div class="card-body">
                    <div id="agama-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-columns me-1"></i>
                    Kewarganegaraan
                </div>
                <div class="card-body">
                    <div id="kewarganegaraan-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-columns me-1"></i>
                    Status Perkawinan
                </div>
                <div class="card-body">
                    <div id="perkawinan-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Data Warga Tidak Mampu
                </div>
                <div class="card-body">
                    <div id="column-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Warga
        </div>
        <div class="card-body">
            <a href="" target="" class="btn btn-primary" id="setpdf" onclick="setPdf()">PDF</a>
            <br><br>
            <table id="datatable-users" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
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

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        defaultJenisKelamin();
        defaultAgama();
        defaultKewarganegaraan();
        defaultPerkawinan();
        defaultTidakMampu();
        setTable();

        $('.filterData').change(function(){
            defaultJenisKelamin();
            defaultAgama();
            defaultKewarganegaraan();
            defaultPerkawinan();
            defaultTidakMampu();
            setTable();
        })
    })

    function defaultJenisKelamin(){
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/jenis-kelamin') }}",{rw:rw,rt:rt},function(res){
            var data = JSON.parse(res);
            setJenisKelamin(data);
        });
    }

    function setJenisKelamin(data){
        Highcharts.chart('jeniskelamin-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Jenis Kelamin Pada Kelurahan'
            },
            subtitle: {
                text: 'Berikut adalah jumlah warga berdasarkan jenis kelamin'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Jumlah',
                data: [
                    ['Laki-Laki', data.laki],
                    ['Perempuan', data.perempuan]
                ]
            }]
        });
    }

    function defaultAgama(){
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/agama') }}",{rw:rw,rt:rt},function(res){
            var data = JSON.parse(res);
            setAgama(data);
        });
    }

    function setAgama(data){
        Highcharts.chart('agama-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Agama Pada Kelurahan'
            },
            subtitle: {
                text: 'Berikut adalah jumlah warga berdasarkan agama'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Jumlah',
                data: [
                    ['Islam', data.islam],
                    ['Protestan', data.protestan],
                    ['Katholik', data.katholik],
                    ['Buddha', data.buddha],
                    ['Khonghucu', data.khonghucu]
                ]
            }]
        });
    }

    function defaultKewarganegaraan(){
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/kewarganegaraan') }}",{rw:rw,rt:rt},function(res){
            var data = JSON.parse(res);
            setKewarganegaraan(data);
        });
    }

    function setKewarganegaraan(data){
        Highcharts.chart('kewarganegaraan-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Kewarganegaraan Pada Kelurahan'
            },
            subtitle: {
                text: 'Berikut adalah jumlah warga berdasarkan kewarganegaraan'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Jumlah',
                data: [
                    ['WNI', data.wni],
                    ['WNA', data.wna]
                ]
            }]
        });
    }
    
    function defaultPerkawinan(){
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/perkawinan') }}",{rw:rw,rt:rt},function(res){
            var data = JSON.parse(res);
            setPerkawinan(data);
        });
    }

    function setPerkawinan(data){
        Highcharts.chart('perkawinan-chart', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Status Perkawinan Pada Kelurahan'
            },
            subtitle: {
                text: 'Berikut adalah jumlah warga berdasarkan status perkawinan'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Jumlah',
                data: [
                    ['MENIKAH', data.menikah],
                    ['BELUM MENIKAH', data.belum],
                    ['CERAI', data.cerai]
                ]
            }]
        });
    }

    function setTable()
    {
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/table') }}",{rw:rw,rt:rt},function(res){
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

            $('#datatable-users tbody').html(html);
            $('#datatable-users').DataTable();
        });
    }

    function defaultTidakMampu(){
        var rw = $('#rw').val();
        var rt = $('#rt').val();
        $.get("{{ URL::to('kelurahan/dashboard-kelurahan/tidak-mampu') }}",{rw:rw,rt:rt},function(res){
            var data = JSON.parse(res);
            console.log(data);
            setTidakMampu(data);
        });
    }

    function setTidakMampu(data){
        Highcharts.chart('column-chart', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Data Warga Tidak Mampu'
            },
            subtitle: {
                text: 'Berikut adalah data tidak mampu berdasarkan normalisasi'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: data.category,
                labels: {
                    skew3d: true,
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [data.series]
        });
    }

    function setPdf(){
        var rw = ($('#rw').val()) ? $('#rw').val() : 0;
        var rt = ($('#rt').val()) ? $('#rt').val() : 0;

        $('#setpdf').attr("href", "{{ URL::to('kelurahan/dashboard-kelurahan/pdf-table/')}}"+'/'+rw+'/'+rt);
        $('#setpdf').attr("target", "_blank");
    }
</script>
@endsection