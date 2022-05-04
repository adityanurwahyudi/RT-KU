@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Video</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Video</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Video
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.video.proses1') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Video</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="URLVideo" class="form-label">URLVideo</label>
                                    <input type="url" class="form-control" id="URLVideo" name="URLVideo" required>
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