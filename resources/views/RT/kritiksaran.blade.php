@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Keamanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Kritik dan Saran</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Kritik dan Saran
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="ronda-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Kritik dan Saran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($kritiksaran as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->kritikdansaran }}</td>
                            <td>
                                <a title="Delete" href="{{route('admin.rt.kritiksaran.hapus',$p->id)}}" class="btn btn-danger"
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
@endsection