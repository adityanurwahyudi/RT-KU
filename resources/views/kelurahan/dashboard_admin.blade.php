@extends('template.backend.main')

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
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-columns me-1"></i>
                    Pie Chart
                </div>
                <div class="card-body">
                    <div id="pie-chart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
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
        defaultPieChart();
        defaultColumnChart();
    })

    function defaultPieChart(){
        pieChart();
    }

    function pieChart(){
        Highcharts.chart('pie-chart', {
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
                    ['Laki-Laki', 5],
                    ['Perempuan', 10]
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