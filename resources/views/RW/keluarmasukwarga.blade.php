@extends('template.backend.main1')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Keamanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Keluar Masuk Warga</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Tamu Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">   
                 <a href="{{ route('admin.rt.tamu.cetak_tamu')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="ronda-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Tanggal Masuk</th>
                            <th>Alamat Terdahulu</th>
                            <th>Alamat Terkini</th>
                            <th>Status Tinggal</th>
                            <th>RT</th>
                            <th>RW</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($tamu as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamatdahulu }}</td>
                            <td>{{ $p->alamatterkini }}</td>
                            <td>{{ $p->status }}</td>
                            <td>{{ $p->RT }}</td>
                            <td>{{ $p->RW }}</td>
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
            Tabel Pindah Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">    
                <a href="{{ route('admin.rt.pindah.cetak_pindah')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
                <br><br>
                
                <table class="table table-striped table-bordered table-hover table-condensed" id="ronda-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Alamat</th>
                            <th>Alamat Pindah</th>
                            <th>Keterangan Pindah</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($pindah as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->alamatpindah }}</td>
                            <td>{{ $p->deskripsi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection