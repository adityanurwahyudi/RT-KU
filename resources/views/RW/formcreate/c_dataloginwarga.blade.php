@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Data Login Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Create Data Login Warga</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Data Login Warga
        </div>

        <div class="card-body">
            <form action="{{ route('admin.rw.dataloginwarga_save') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Warga</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="number" class="form-control" id="rt" name="rt" required>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
</script>
@endsection