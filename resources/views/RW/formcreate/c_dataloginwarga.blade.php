@extends('template.backend.main1')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Create Data Login RT</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Create Data Login RT</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create Data Login RT
        </div>

        <div class="card-body">
            <form action="{{ route('admin.rw.dataloginwarga_save') }}" method="post" enctype="multipart/form-data">
            @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama RT</label>
                    <input type="text" onkeyup="Alphabet('nama','Nama Harus Huruf')" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" onchange="cekEmail()" onkeyup="Email('email','Email Yang Bener')" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" onchange="cekTelpon()" onkeyup="COBA('telepon','Telepon Harus Angka')" class="form-control" id="telepon" name="telepon" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="rt" class="form-label">RT</label>
                    <input type="text" onchange="cekRt()"  onkeyup="COBA('rt','RT Harus Angka')" class="form-control" id="rt" name="rt" required>
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
            function COBA(id, pesan) {
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
    
            function cekTelpon(){
              var telpon = $('#telepon').val();
              $.get("{{ URL::to('RW/data-login-warga/telpon') }}",{telpon:telpon},
              function(res){
                  
              if(res == 1){
                    alert('Telpon Sudah Terdaftar');
                    $('#telepon').val('');
                  }
              });
            }
            function cekRt(){
              var rt = $('#rt').val();
              $.get("{{ URL::to('RW/data-login-warga/rt') }}",{rt:rt},
              function(res){
                  
              if(res == 1){
                    alert('RT Sudah Terdaftar');
                    $('#rt').val('');
                  }
              });
            }
            function cekEmail(){
              var email = $('#email').val();
              $.get("{{ URL::to('RW/data-login-warga/email') }}",{email:email},
              function(res){
                  
                  if(res == 1){
                    alert('Email Sudah Terdaftar');
                    $('#email').val('');
                  }
              });
            }
</script>
@endsection