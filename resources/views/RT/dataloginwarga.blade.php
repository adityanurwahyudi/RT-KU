@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Login Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Data Login Warga</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Login Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.dataloginwarga_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Password</th>
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
                            <td>
                                @if($val->status == 0 ) 
                                <a title="Verifikasi" href="{{ route('admin.rt.dataloginwarga_verifakun',$val->id) }}" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Verifikasi</a>
                                    @else 
                                <a title="Edit" href="{{ route('admin.rt.dataloginwarga_edit',$val->id) }}" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                                <button title="Delete" class="btn btn-danger"
                                    onclick="hapus('{{ $val->id }}')"><i class="fa fa-trash"></i> Delete</button>
                           @endif
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
                    window.location.href = "{{ URL::to('RT/data-login-warga/hapus')}}"+'/'+id;
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