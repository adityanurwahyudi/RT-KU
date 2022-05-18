@extends('template.backend.main')

@section('content')

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<style>
    .hide {
        display: none !important
    }
    </style>
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Data Warga</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Create Data Warga</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Data Warga
        </div>

        <div class="card-body">
            <form action="{{ route('admin.rt.dataloginwarga_save') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Warga</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label><br>
                    <input id="jeniskelamin" type="radio" name="jeniskelamin" value="Laki-laki" required />Laki-laki
                    <input id="jeniskelamin" type="radio" name="jeniskelamin" value="Perempuan" />Perempuan
                <br/>    
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan </label>
                    <input type="number" class="form-control" id="nik" name="nik" >
                </div>
                <div class="mb-3">
                    <label for="nokk" class="form-label">Nomor Kartu Keluarga </label>
                    <input type="number" class="form-control" id="nokk" name="nokk" >
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
                <label for="agama" class="form-label">Agama</label><br>
                    <select class="form-control"for="agama" id="agama" name="agama">
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
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" >
                </div>
                <div class="mb-3">
                    <label for="usia" class="form-label">Usia</label>
                    <input type="text" class="form-control" id="usia" name="usia" readonly>
                </div>
                <div class="form-group-2 mb-4">
                    <label for="alamat" class="form-label">Alamat </label>
                    <textarea id="alamat" name="alamat" class="form-control" rows="4" placeholder="Alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" >
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label><br>
                    <input id="kewarganegaraan" type="radio" name="kewarganegaraan" value="WNI"/>Warga Negara Indonesia
                    <input id="kewarganegaraan" type="radio" name="kewarganegaraan" value="WNA"/>Warga Negara Asing
                <br/>    
                </div>
                <div class="mb-3">
                    <label for="statuspernikahan" class="form-label">Status Pernikahan</label><br>
                    <input id="statuspernikahan" type="radio" name="statuspernikahan" value="Menikah"/>Menikah
                    <input id="statuspernikahan" type="radio" name="statuspernikahan" value="BelumMenikah"/>Belum Menikah
                    <input id="statuspernikahan" type="radio" name="statuspernikahan" value="Cerai"/>Cerai
                    <br/>    
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
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

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#tanggallahir" ).date();
        });
 
        window.onload=function(){
            $('#tanggallahir').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#usia').val(age);
            });
        }
 
    </script>
@endsection