@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Verifikasi Akun Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Verifikasi Akun Warga</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Verifikasi Akun Warga
        </div>

        <div class="card-body">
            <form action="{{ route('admin.rt.dataloginwarga_verif') }}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{ $users->id_users }}">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Warga</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $users->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" readonly>
                </div>
                       <div class="form-group">
                       <font color="#000000">Jenis Kelamin </font><br>
                        <input type="radio" name="jeniskelamin" value="Laki-laki" disabled
                         {{ ($users->jeniskelamin == 'Laki-laki') ? 'checked' : '' }}
                        >Laki-Laki
                        <input type="radio" name="jeniskelamin" value="Perempuan" disabled {{ ($users->jeniskelamin == 'Perempuan') ? 'checked' : '' }}
                        >Perempuan
                        </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="tel" class="form-control" id="telepon" name="telepon" value="{{ $users->telpon }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="{{ $users->password_real }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $users->alamat }}" readonly>
                </div>
                <label>Status Verifikasi:</label><br>
                                <select for="status" id="status" value="{{ $users->status }}"  name="status" class="form-label form-control">
                                <option value="1" {{ ($users->status == '1') ? 'selected' : '' }}>Diterima</option>
                                <option value="0" {{ ($users->status == '0') ? 'selected' : '' }}>Ditolak</option>
                                </select>
                                <br>
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
