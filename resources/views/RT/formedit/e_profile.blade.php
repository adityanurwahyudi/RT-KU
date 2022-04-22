@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Berita
                        </div>

                        <div class="card-body">                            
                            @php
                            $p = $profile
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
                            <form action="{{ route('admin.rt.profile.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @foreach($profile as $p)
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama RT</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $p->deskripsi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $p->tanggal }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="visi" class="form-label">Visi</label>
                                    <input type="text" class="form-control" id="visi" name="visi" value="{{ $p->visi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="misi" class="form-label">Misi</label>
                                    <input type="text" class="form-control" id="misi" name="misi" value="{{ $p->misi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="profilert" class="form-label">Foto Profile RT</label>
                                    <input type="text" class="form-control" id="profilert" name="profilert" value="{{ $p->profilert }}"
                                        disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="profilert" class="form-label">Foto Profile RT</label>
                                    <input type="file" class="form-control" id="profilert" name="profilert" 
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="strukturorganisasi" class="form-label">Struktur Organisasi</label>
                                    <input type="text" class="form-control" id="strukturorganisasi" name="strukturorganisasi" 
                                    value="{{ $p->strukturorganisasi }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="strukturorganisasi" class="form-label">Struktur Organisasi</label>
                                    <input type="file" class="form-control" id="strukturorganisasi" name="strukturorganisasi" 
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $p->alamat }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $p->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" value="{{ $p->telepon }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="urlmap" class="form-label">URL Lokasi Map</label>
                                    <input type="text" class="form-control" id="urlmap" name="urlmap" value="{{ $p->urlmap }}" required>
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