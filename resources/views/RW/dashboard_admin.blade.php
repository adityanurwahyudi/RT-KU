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
		        <a href="{{ route('admin.rw.datawarga.cetak_datawarga')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
		         <br><br>
                 <div class="d-flex flex-row align-items-center mb-4">
                    <div for="rt" class="form-outline flex-fill mb-0">
                        <label >RT:</label>
                            <select name="filter_rt" id="filter_rt">
                            @foreach($rt as $val)
                            <option value="{{ $val->rt }}">{{ $val->rt }}</option>
                            @endforeach
                            </select>
                         </div>
                    </div>
                    
                <table class="table table-striped table-bordered table-hover table-condensed" id="satu">
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
                            <th>rt Lahir</th>
                            <th>Usia</th>
                            <th>Pekerjaan</th>
                            <th>Status Menikah</th>
                            <th>Kewarganegaraan</th>
                            <th>Foto Profile</th>
                            <th style="width: auto;">Action</th>
                        </tr>
                    </thead>
<tbody>
				@php $No=1 @endphp
                     @foreach($detail_users as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telpon }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nokk }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>{{ $p->jeniskelamin }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->tanggallahir }}</td>
                            <td>{{ $p->usia }}</td>
                            <td>{{ $p->pekerjaan }}</td>
                            <td>{{ $p->statuspernikahan }}</td>
                            <td>{{ $p->kewarganegaraan }}</td>
                            
                        </tr>
                        @endforeach
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
                            <th>No</th>
                            <th>Islam</th>
                            <th>Kristen Protestan</th>
                            <th>Katolik</th>
                            <th>Hindu</th>
                            <th>Budha</th>
                            <th>Kong Hu Cu</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$islam}}</td>
                            <td>{{$protestan}}</td>
                            <td>{{$katholik}}</td>
                            <td>{{$hindu}}</td>
                            <td>{{$buddha}}</td>
                            <td>{{$konghucu}}</td>
                        </tr>
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
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Warga Negara Indonesia</th>
                            <th>Warga Negara Asing</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$WNI}}</td>
                            <td>{{$WNA}}</td>
                        </tr>
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
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menikah</th>
                            <th>Belum Menikah</th>
                            <th>Cerai</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$Menikah}}</td>
                            <td>{{$BelumMenikah}}</td>
                            <td>{{$Cerai}}</td>
                        </tr>
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
                            <th>No</th>
                            <th>0-10</th>
                            <th>10-25</th>
                            <th>25-40</th>
                            <th>40-60</th>
                            <th>60></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> </td>
                        </tr>
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
                            <th>No</th>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$lakilaki}}</td>
                            <td>{{$perempuan}}</td>
                        </tr>
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
        getData();
        $('#filter_rt').change(function(){
            getData();
        })
    });
    function getData(){
        var table = $('#satu').DataTable();
        var rt = $('#filter_rt').val();
        $.get("{{ URL::to('RW/rt/datatable') }}",{rt:rt},function(res){
            // var data = JSON.parse(res);
            $.each(res, function(i, val){
                table.row.add([
                    i+1,
                    val.name,
                    tgl_indo(val.rt),
                    '<a title="Edit" href="{{ url("/RT/jadwal-ronda/edit/") }}/'+val.id+'" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;'+
                    '<button title="Delete" class="btn btn-danger" onclick="hapus('+val.id+')"> <i class="fa fa-trash"></i> Delete</button>'
                ]).draw();
            })
        });
        table.clear();
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
                