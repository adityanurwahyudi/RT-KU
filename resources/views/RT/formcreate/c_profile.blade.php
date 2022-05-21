@extends('template.backend.main')

@section('content')
<style>
    .hide {
        display: none !important
    }
    </style>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Profile RT</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Profile RT</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Profile RT
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.profile.proses') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama RT</label>
                                    <input type="text" class="form-control" onkeyup="Alphabet('nama','Nama Harus Huruf')" id="nama" name="nama" required>
                                </div> 
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                 <div class="form-group-2 mb-4">
                                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                    placeholder="Deskripsi" required></textarea>
                            </div>
                                
                                <div class="mb-3">
                                    <label for="profilert" class="form-label">Foto Profile RT</label>
                                    <input type="file" class="form-control" id="profilert" name="profilert" required>
                                </div>
                                <div class="mb-3">
                                    <label for="strukturorganisasi" class="form-label">Struktur Organisasi</label>
                                    <input type="file" class="form-control" id="strukturorganisasi" name="strukturorganisasi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" onchange="cekEmail()" onkeyup="Email('email','Email Yang Bener')" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="text" onchange="cekTelpon()" onkeyup="Number('telepon','Telepon Harus Angka')" class="form-control" id="telepon" name="telepon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="urlmap" class="form-label">URL Lokasi Maps</label>
                                    <textarea id="urlmap" name="urlmap" class="form-control" rows="4"
                                    placeholder="URL Lokasi Maps" required></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/sbadmin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/sbadmin/js/datatables-simple-demo.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        var sampleHtml = $(".copy").html();
        var sampleHtml1 = $(".copy1").html();
        $(".copy").remove(); 
        $(".copy1").remove();
        $(".add-more").click(function() {
            //var sampleHtml = $(".copy").html();
            $(".after-add-more").after(sampleHtml);
        });
        $(".add-more1").click(function() {
            //var sampleHtml = $(".copy").html();
            $(".after-add-more1").after(sampleHtml1);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
    
    </script>
    <script>
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
            function Number(id, pesan) {
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
              $.get("{{ URL::to('RT/data-login-warga/telpon') }}",{telpon:telpon},
              function(res){
                  
                console.log(res)
                  if(res == 1){
                    alert('Telpon Sudah Terdaftar');
                    $('#telpon').val('');
                  }
              });
                  console.log('aad')
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
@endsection 