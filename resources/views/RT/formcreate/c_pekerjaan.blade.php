@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Pekerjaan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Pekerjaan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Pekerjaan
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.pekerjaan.proses') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Nama Pekerjaan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bobot" class="form-label">Bobot</label>
                                    <input type="text" class="form-control" id="bobot" name="bobot" required>
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