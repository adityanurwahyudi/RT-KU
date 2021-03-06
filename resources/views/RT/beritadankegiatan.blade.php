@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Berita dan Kegiatan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Berita dan Kegiatan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Berita
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.berita.tambah') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                     @foreach($berita as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/berita/'.$p->gambar)}}"></td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.berita.edit',$p->id)}} " class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a title="Delete" href="{{route('admin.rt.berita.hapus',$p->id)}} " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                                @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kegiatan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.kegiatan.tambah1') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($kegiatan as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/kegiatan/'.$p->gambar)}}"></td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.kegiatan.edit1',$p->id)}}" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a title="Delete" href="{{route('admin.rt.kegiatan.hapus',$p->id)}} " class="btn btn-danger"
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