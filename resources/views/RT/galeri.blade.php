@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Galeri</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Galeri</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Foto
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.foto.tambah') }}" class="btn btn-primary"><i class="fa fa-plus"></i>  Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed"
                    id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($foto as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/foto/'.$p->gambar)}}"></td>
                            <td>
                                <a title="Delete" href="{{route('admin.rt.foto.hapus',$p->id)}}"  class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-4">

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Video
        </div>
        <div class="card-body">
            <a href="{{ route('admin.rt.video.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
            <br><br>
            <table class="table table-striped table-bordered table-hover table-condensed"
                id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>URLVideo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($video as $p)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->URLVideo }}</td>
                        <td>
                            <a title="Edit" href="{{route('admin.rt.video.edit',$p->id)}}"  class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                            <a title="Delete" href="{{route('admin.rt.video.hapus',$p->id)}}"  class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
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