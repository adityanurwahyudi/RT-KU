@extends('template.backend.main2')

@section('css')
    <style>
        .highcharts-credits{
            display:none;
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
        <div class="col-xl-6" style="display:none;">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Column Chart
                </div>
                <div class="card-body">
                    <div id="column-chart" style="height:400px;"></div>
                </div>
            </div>
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
        defaultColumnChart();

        $('.filterData').change(function(){
            defaultJenisKelamin();
            defaultAgama();
            defaultKewarganegaraan();
            defaultPerkawinan();
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

    function defaultColumnChart(){
        columnChart();
    }

    function columnChart(){
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
                text: 'Data Surat Pada Tahun 2020'
            },
            subtitle: {
                text: 'Berikut adalah beberapa surat pengajuan'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
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
            series: [{
                name: 'Domisili',
                data: [2, 3, 0, 4, 0, 5, 1, 4, 6, 3, 2, 1]
            },{
                name: 'Menikah',
                data: [2, 3, 0, 4, 0, 5, 1, 4, 6, 3 ,2 ,1]
            }]
        });
    }
</script>
@endsection