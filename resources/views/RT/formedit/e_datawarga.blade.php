@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Login Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Data Login Warga</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Data Login Warga
        </div>

        <div class="card-body">
            <form action="{{ route('admin.rt.datawarga.update') }}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{ $p->id }}">
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan </label>
                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $p->nik }}">
                </div>
                <div class="mb-3">
                    <label for="nokk" class="form-label">Nomor Kartu Keluarga </label>
                    <input type="number" class="form-control" id="nokk" name="nokk" value="{{ $p->nik }}" >
                </div>
                <div class="mb-3">
                <label for="agama" class="form-label">Agama</label><br>
                    <select class="form-control"for="agama" id="agama" name="agama" value="{{ $p->nik }}">
                    <option value="islam">Islam</option>
                    <option value="protestan">Protestan</option>
                    <option value="katholik">Katholik</option>
                    <option value="hindu">Hindu</option>  
                    <option value="buddha">Buddha</optin>
                    <option value="khonghucu">Khonghucu</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggallahir" class="form-label">Tanggal Lahir </label>
                    <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="{{ $p->tanggallahir }}" >
                </div>
                <div class="mb-3">
                    <label for="tanggallahir" class="form-label">Tanggal Lahir </label>
                    <input type="file" class="form-control" id="tanggallahir" name="tanggallahir"  >
                </div>
                <div class="form-group-2 mb-4">
                    <label for="alamat" class="form-label">Alamat </label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $p->alamat }}" >
                </div>
                
                <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                    <select class="form-control"for="jeniskelamin" id="jeniskelamin" name="jeniskelamin" value="{{ $p->jeniskelamin }}">
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                
                <div class="mb-3">
                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label><br>
                    <select class="form-control"for="kewarganegaraan" id="kewarganegaraan" name="kewarganegaraan" value="{{ $p->kewarganegaraan }}">
                    <option value="WNI">Warga Negara Indonesia</option>
                    <option value="WNA">Warga Negara Asing</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" >
                </div>
                <div class="mb-3">
                <label for="statuspernikahan" class="form-label">Status Pernikahan</label><br>
                    <select class="form-control"for="statuspernikahan" id="statuspernikahan" name="statuspernikahan" value="{{ $p->statuspernikahan }}">
                    <option value="Menikah">Menikah</option>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Cerai">Cerai</option>
                    </select>
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
