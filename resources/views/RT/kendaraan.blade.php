@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Pemohon Kartu Akses Kendaraan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Akses Kendaraan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Pemohon Akses Kendaraan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kendaraan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nopol</th>
                            <th>jenis Kendaraan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Alamat</th>
                            <th>Status Pengajuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($kendaraan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->nopol }}</td>
                            <td>{{ $p->jeniskendaraan }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->status }}</td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.kendaraan.edit',$p->id)}}" class="btn btn-info">Edit</a>
                                <a title="Delete" href="{{route('admin.rt.kendaraan.hapus',$p->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
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