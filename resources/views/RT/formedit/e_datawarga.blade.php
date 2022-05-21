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
            @foreach ($datawarga as $datawarga)
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $datawarga->id_users }}" required>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name" value="{{ $datawarga->name }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control" id="telepon" name="telepon" value="{{ $datawarga->telpon }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $datawarga->email }}">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan </label>
                    <input type="number" class="form-control" id="nik" name="nik" value="{{ $datawarga->nik }}">
                </div>
                <div class="mb-3">
                    <label for="nokk" class="form-label">Nomor Kartu Keluarga </label>
                    <input type="number" class="form-control" id="nokk" name="nokk" value="{{ $datawarga->nokk }}" >
                </div>
                       <div class="form-group">
                       <font color="#000000">Agama  </font><br>
                          <select  class="form-control" id="agama"   name="agama" for="agama">
                        <option value="islam" @if($datawarga->agama == 'islam') selected @endif >Islam</option>
                        <option value="protestan" @if($datawarga->agama == 'protestan') selected @endif >Protestan</option>
                        <option value="katholik" @if($datawarga->agama == 'katholik') selected @endif>Khatolik</optionv>
                        <option value="buddha" @if($datawarga->agama == 'buddha') selected @endif>Buddha</option>
                        <option value="khonghucu" @if($datawarga->agama == 'khonghucu') selected @endif>Khonghucu</option>
                          </select>
                        </div> 
                       <div class="form-group">
                       <font color="#000000">Jenis Kelamin </font><br>
                        <input type="radio" name="jeniskelamin" value="Laki-laki"
                         {{ ($datawarga->jeniskelamin == 'Laki-laki') ? 'checked' : '' }}
                        >Laki-Laki
                        <input type="radio" name="jeniskelamin" value="Perempuan" {{ ($datawarga->jeniskelamin == 'Perempuan') ? 'checked' : '' }}
                        >Perempuan
                        </div>
                
                <div class="form-group-2 mb-4">
                    <label for="alamat" class="form-label">Alamat </label>
                    <textarea type="text" class="form-control" id="alamat" name="alamat" value="{{ $datawarga->alamat }}" ></textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggallahir" class="form-label">Tanggal Lahir </label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir"  value="{{ $datawarga->tanggallahir }}">
                </div>
                <div class="mb-3">
                    <label for="usia" class="form-label">Usia </label>
                    <input type="text" class="form-control" id="usia" name="usia"  value="{{ $datawarga->usia }}">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" value="{{ $datawarga->pekerjaan }}" name="pekerjaan" >
                </div>
                
                <div class="form-group">
                       <font color="#000000">Kewarganegaraan </font><br>
        
                        <input type="radio" name="kewarganegaraan" value="WNI" 
                        {{ $datawarga->kewarganegaraan == 'WNI' ? 'checked' : '' }}
                        >Warga Negara Indonesia
                        <input type="radio" name="kewarganegaraan" value="WNA"
                        {{ $datawarga->kewarganegaraan == 'WNA' ? 'checked' : '' }}
                        >Warga Negara Asing
                        </div> 
                       <div class="form-group">
                       <font color="#000000">Status Pernikahan</font><br>
                          <select  class="form-control" id="statuspernikahan" value="{{ $datawarga->statuspernikahan }}"  name="statuspernikahan" for="statuspernikahan">
                        <option value="Menikah"{{ ($datawarga->statuspernikahan == 'Menikah') ? 'selected' : '' }}>Menikah</option>
                        <option value="Belum_Menikah"{{ ($datawarga->statuspernikahan == 'Belum_Menikah') ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Cerai"{{ ($datawarga->statuspernikahan == 'Cerai') ? 'selected' : '' }}>Cerai</optionv>
                          </select> 
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
