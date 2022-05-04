@extends('template.backend.main')

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
                <a href="{{ route('admin.rt.datawarga.tambah') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
		        <a href="{{ route('admin.rt.datawarga.cetak_datawarga')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
		         <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="satu">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No KK</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
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
                     @foreach($datakependudukan as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nokk }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->agama }}</td>
                            <td>{{ $p->jeniskelamin }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->tanggallahir }}</td>
                            <td>{{ $p->usia }}</td>
                            <td>{{ $p->pekerjaan }}</td>
                            <td>{{ $p->statuspernikahan }}</td>
                            <td>{{ $p->kewarganegaraan }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/datakependudukan/'.$p->fotoprofile)}}"></td>
                            
                            <td>

                                <a title="Edit" href="{{route('admin.rt.datawarga.edit',$p->id)}} " class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                <a title="Delete" href="{{route('admin.rt.datawarga.hapus',$p->id)}} " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i> Delete</a>
                            </td>
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
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Islam</th>
                            <th>Kristen Protestan</th>
                            <th>Katholik</th>
                            <th>Hindu</th>
                            <th>Budha</th>
                            <th>Kong Hu Cu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                <br>
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
            Data Warga Tidak Mampu
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <a href="{{ route('admin.rt.datawarga.cetak_datawargatidakmampu')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
                    <br><br>
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
                <br>
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
        
    })
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