@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Profile Security</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Profile Security</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Profile Security
                        </div>

                        <div class="card-body">
                            <form action="{{route('admin.rt.security.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @foreach($security as $p)
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama </label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" value="{{ $p->telepon }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Foto Profile </label>
                                    <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $p->gambar }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Foto Profile</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar"  required>
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
    $(document).ready(function() {
    });
</script>
@endsection