@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Video</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Video</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Video
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.video.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @foreach($video as $p)
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}" required>
                                </div>
                    
                                <div class="mb-3">
                                    <label for="URLVideo" class="form-label">URL Video</label>
                                    <input type="text" class="form-control" id="URLVideo" name="URLVideo" value="{{ $p->URLVideo }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
                
        @endsection

@section('script')
<script type="text/javascript">
</script>
@endsection 