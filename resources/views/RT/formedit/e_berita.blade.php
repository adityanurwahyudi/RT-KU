@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Berita</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Berita</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Berita
                        </div>

                        <div class="card-body">                            
                            @php
                            $p = $berita
                            @endphp
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('admin.rt.berita.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $berita->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Berita</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $berita->nama }}" >
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $berita->deskripsi }}"
                                        >
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="text" class="form-control" id="gambar" name="gambar" value="{{ $p->gambar }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" >
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