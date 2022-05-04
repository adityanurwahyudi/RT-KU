@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Login RT</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Data Login RT</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Login RT
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rw.dataloginwarga_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="loginwarga-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama RT</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Password</th>
                            <th>RT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $val)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->telpon }}</td>
                            <td>{{ $val->password_real }}</td>
                            <td>{{ $val->rt }}</td>
                            <td>

                                <a title="Edit" href="{{ route('admin.rw.dataloginwarga_edit',$val->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> Edit</a>
                                <button title="Delete" class="btn btn-danger"
                                    onclick="hapus('{{ $val->id }}')"> <i class="fa fa-trash"></i> Delete</button>
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

    function hapus(id)
    {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Akun Tersebut",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
            }).then((result) => {
                if(result.value){
                    window.location.href = "{{ URL::to('RW/data-login-warga/hapus')}}"+'/'+id;
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: "Batal Hapus",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
        })
    }
</script>
@endsection