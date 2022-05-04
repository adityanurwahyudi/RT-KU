@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Profile RT</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Profile RT</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Profile RT
        </div>
        <div class="card-body 
  overflow-x: scroll;">
            <div class="table-responsive">
                <a href="{{route('admin.rt.profile.tambah') }}" class="btn btn-primary"><i class="fa fa-plus"></i>  Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Deskripsi</th>
                            <th>Foto Profile</th>
                            <th>Struktur Organisasi</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>URL lokasi map</th>
                            <th width="500">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($profile as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->deskripsi }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/profile/'.$p->profilert)}}"></td>
                            <td><img width="100" height="100"src="{{asset('upload/profile/'.$p->strukturorganisasi)}}"></td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->urlmap }}</td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.profile.edit',$p->id)}}" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <a title="Delete" href="{{route('admin.rt.profile.hapus',$p->id)}}" class="btn btn-danger"
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