<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pelaporan Tamu</title>
    
    <!-- Favicons -->
    <link href="{{ asset('/sbadmin/assets/img/register.png') }}" rel="icon">
    <link href="{{asset('/superwarga/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    
    <link href="{{asset('/sbadmin/css/styles.css')}}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <section class="vh-100" style="background-color: #eee;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-5">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Pelaporan Tamu
                                            </p>

                                            <form action="{{ route('admin.rt.tamu.proses') }}"  method="post"
                                                class="mx-1 mx-md-4" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="nama" class="form-outline flex-fill mb-0">
                                                        <input type="text" id="nama" name="nama" onkeypress="return hanyaHuruf(event)"
                                                            placeholder="Nama Lengkap" class="form-control" required
                                                            maxlength="40" minlength="4" />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="email" class="form-outline flex-fill mb-0">
                                                        <input type="email" name="email" placeholder="Alamat Email"
                                                            id="email" onchange="cekEmail()" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="telepon"class="form-outline flex-fill mb-0">
                                                        <input type="number" id="telepon" name="telepon"
                                                            placeholder="Nomor Telepon" class="form-control"
                                                            minlength="10" maxlength="20" onchange="cekTelpon()" onkeyup="Nomor('telepon','Telepon Harus Angka')" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="tanggal" class="form-outline flex-fill mb-0">
                                                        <label >Tanggal Masuk:</label>
                                                        <input type="date" name="tanggal" id="tanggal"
                                                            placeholder="Tanggal Masuk" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="alamatdahulu" class="form-outline flex-fill mb-0">
                                                        <textarea type="text" id="alamatdahulu" name="alamatdahulu"
                                                            placeholder="Alamat Dahulu" class="form-control" required
                                                            maxlength="120" minlength="4" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="alamatterkini"class="form-outline flex-fill mb-0">
                                                        <textarea type="text" id="alamatterkini" name="alamatterkini"
                                                            placeholder="Alamat Terkini" class="form-control" required
                                                            maxlength="120" minlength="4" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div >
                                                        <label >Status Tinggal:</label>
                                                        <select for="status" class="form-outline flex-fill mb-0" name="tinggal" id="tinggal">
                                                            <option value="sementara">Sementara</option>
                                                            <option value="menetap">Menetap</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div for="rt" class="form-outline flex-fill mb-0">
                                                        <label >RT:</label>
                                                        <select name="RT" id="RT">
                                                            @foreach($rt as $val)
                                                                <option value="{{ $val->rt }}">{{ $val->rt }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label >RW:</label>
                                                        <select name="RW" id="RW">
                                                            @foreach($rw as $val)
                                                                <option value="{{ $val->rw }}">{{ $val->rw }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="hidden" name="status" id="status" value="tamu" />
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" value="Simpan Data"
                                                        class="btn btn-primary btn-lg">Lapor</button>
                                                </div>

                                            </form>

                                        </div>
                                        <div
                                            class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                            <img 
                                            
                                            src="{{ asset('/sbadmin/assets/img/1.png') }}" class="img-fluid" alt="Sample image">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/sbadmin/js/scripts.js"></script>
    <script type=”text/javascript” window.onload=function() {
        document.getElementById(“password”).onchange=validatePassword;
        document.getElementById(“retypepassword”).onchange=validatePassword; } function validatePassword() { var
        pass2=document.getElementById(“retypepassword”).value; var pass1=document.getElementById(“password”).value; if
        (pass1 !=pass2) document.getElementById(“retypepassword”).setCustomValidity(“Passwords Tidak Sama”); else
        document.getElementById(“retypepassword″).setCustomValidity(”); }>
    </script>
    
@section('script')
     
<script type="text/javascript">
   
   function hanyaHuruf(event){
            var charCode = (event.which) ? event.which : event.keyCode
            if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
                return false;
            return true;
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
    
    function cekTelpon(){
        var telpon = $('#telepon').val();
        $.get("{{ URL::to('/register/telpon') }}",{telpon:telpon},
        function(res){
            
        if(res == 1){
            alert('Telpon Sudah Terdaftar');
            $('#telepon').val('');
            }
        });
    }
    function cekEmail(){
        var email = $('#email').val();
        $.get("{{ URL::to('/register/email') }}",{email:email},
        function(res){
            
        console.log(res)
            if(res == 1){
            alert('Email Sudah Terdaftar');
            $('#email').val('');
            }
        });
    }
        
</script>


<script type="text/javascript">
    $(document).ready(function(){
        
    })
</script>

@if(Session::has('success'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("success") }}',
            'success'
        )
    </script>
@endif
@if(Session::has('error'))
    <script>
        Swal.fire(
            '',
            '{{ Session::get("error") }}',
            'error'
        )
    </script>
@endif