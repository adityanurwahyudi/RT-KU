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
                <input type="hidden" class="form-control" id="id" name="id" value="{{ $datawarga->id_users }}" required>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" onkeyup="Alphabet('Nama','Nama Harus Huruf')"id="nama" name="name" value="{{ $datawarga->name }}">
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Nomor Handphone</label>
                    <input type="text" onchange="cekTelpon()" class="form-control" onkeyup="Nomor('telepon','Telepon Harus Angka')"  id="telepon" name="telepon" value="{{ $datawarga->telpon }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" onchange="cekEmail()" class="form-control" id="email" onkeyup="Email('email','Email Yang Benar ')"  name="email" value="{{ $datawarga->email }}">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan </label>
                    <input type="text" onchange="cekNik()" class="form-control" id="nik" onkeyup="Nomor('nik','NIK Harus Angka')" name="nik" value="{{ $datawarga->nik }}">
                </div>
                <div class="mb-3">
                    <label for="nokk" class="form-label">Nomor Kartu Keluarga </label>
                    <input type="text"  onkeyup="Nomor('nokk','Nomer KK Harus Angka')" class="form-control" id="nokk" name="nokk" value="{{ $datawarga->nokk }}" >
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
                        </div> <br> 
                       <div class="form-group">
                       <font color="#000000">Jenis Kelamin </font><br>
                        <input type="radio" name="jeniskelamin" value="Laki-laki"
                         {{ ($datawarga->jeniskelamin == 'Laki-laki') ? 'checked' : '' }}
                        >Laki-Laki
                        <input type="radio" name="jeniskelamin" value="Perempuan" {{ ($datawarga->jeniskelamin == 'Perempuan') ? 'checked' : '' }}
                        >Perempuan
                        </div><br>
                
                <div class="form-group-2 mb-4">
                    <label for="alamat" class="form-label">Alamat </label>
                    <textarea type="text" class="form-control" id="alamat" rows="4" name="alamat" value="{{ $datawarga->alamat }}" >{{ $datawarga->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tanggallahir" class="form-label">Tanggal Lahir </label>
                    <input type="text" class="form-control" id="tanggallahir" name="tanggallahir"  value="{{ $datawarga->tanggallahir }}">
                </div>
                <div class="mb-3">
                    <label for="usia" class="form-label">Usia </label>
                    <input type="text" class="form-control" id="usia" name="usia"  value="{{ $datawarga->usia }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" onkeyup="Alphabet('pekerjaan','Pekerjaan Harus Huruf')"  id="pekerjaan" value="{{ $datawarga->pekerjaan }}" name="pekerjaan" >
                </div>
                
                <div class="form-group">
                       <font color="#000000">Kewarganegaraan </font><br>
        
                        <input type="radio" name="kewarganegaraan" value="WNI" 
                        {{ $datawarga->kewarganegaraan == 'WNI' ? 'checked' : '' }}
                        >Warga Negara Indonesia
                        <input type="radio" name="kewarganegaraan" value="WNA"
                        {{ $datawarga->kewarganegaraan == 'WNA' ? 'checked' : '' }}
                        >Warga Negara Asing
                        </div> <br>
                       <div class="form-group">
                       <font color="#000000">Status Pernikahan</font><br>
                          <select  class="form-control" id="statuspernikahan" value="{{ $datawarga->statuspernikahan }}"  name="statuspernikahan" for="statuspernikahan">
                        <option value="Menikah"{{ ($datawarga->statuspernikahan == 'Menikah') ? 'selected' : '' }}>Menikah</option>
                        <option value="Belum_Menikah"{{ ($datawarga->statuspernikahan == 'Belum_Menikah') ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Cerai"{{ ($datawarga->statuspernikahan == 'Cerai') ? 'selected' : '' }}>Cerai</optionv>
                          </select> 
                        </div>
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
<script language="JavaScript">
            function Alphabet(id, pesan) {
                
                var nilai = document.getElementById(id);
                var alphaExp = /^[a-zA-Z]+$/;
                if(nilai.value!= ''){
                
                if(nilai.value.match(alphaExp)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    nilai.value='';
                    return false;
                }
            }
            }
            function Nomor(id, pesan) {
                var nilai = document.getElementById(id);
                var numberExp = /^[0-9]+$/;
                if(nilai.value!= ''){
                    
                if(nilai.value.match(numberExp)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    nilai.value='';
                    return false;
                }

                }
                
            }
            function Email(nilai, pesan) {
                var email = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
                if(nilai.value.match(email)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    return false;
                }
            }
    
            function cekNik(){
              var nik = $('#nik').val();
              $.get("{{ URL::to('RT/data-login-warga/nik') }}",{nik:nik},
              function(res){
                  if(res == 1){
                    alert('NIK Sudah Terdaftar');
                    $('#nik').val('');
                  }
              });
            }
            
            function cekTelpon(){
              var telpon = $('#telepon').val();
              $.get("{{ URL::to('RT/data-login-warga/telpon') }}",{telpon:telpon},
              function(res){
                  
              if(res == 1){
                    alert('Telpon Sudah Terdaftar');
                    $('#telepon').val('');
                  }
              });
            }
            function cekEmail(){
              var email = $('#email').val();
              $.get("{{ URL::to('RT/data-login-warga/email') }}",{email:email},
              function(res){
                  
                console.log(res)
                  if(res == 1){
                    alert('Email Sudah Terdaftar');
                    $('#email').val('');
                  }
              });
            }
        
        </script>
    <script>
        $(function() {
            //$( "#tanggallahir" ).date();
            flatpickr("#tanggallahir", {
                 enableTime: false,
                 dateFormat: "Y-m-d ",
                 maxDate: "today"
                });
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
