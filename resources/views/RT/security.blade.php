@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Security</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Security</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel daftar security
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.security.tambah') }}" class="btn btn-primary">Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="security-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto Profile</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($security as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/security/'.$p->gambar)}}"></td>
                            <td>{{ $p->telepon }}</td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.security.edit',$p->id)}}" class="btn btn-info">Edit</a>
                                <a title="Delete" href="{{route('admin.rt.security.hapus',$p->id)}}" class="btn btn-danger"
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