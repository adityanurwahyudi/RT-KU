<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Registrasi Tamu</title>
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

                                            <form action="{{url('/kawanlenta/store')}}" method="post"
                                                class="mx-1 mx-md-4" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="nama" name="nama"
                                                            placeholder="Nama Lengkap" class="form-control" required
                                                            maxlength="40" minlength="4" />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" name="email" placeholder="Alamat Email"
                                                            id="email" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="tel" id="telepon" name="telepon"
                                                            placeholder="Nomor Telepon" class="form-control"
                                                            minlength="10" maxlength="20" required />
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label for="tanggalmasuk">Tanggal Masuk:</label>
                                                        <input type="date" name="tanggalmasuk" id="tanggalmasuk"
                                                            placeholder="Tanggal Masuk" class="form-control" required />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="alamatdulu" name="alamatdulu"
                                                            placeholder="Alamat Dahulu" class="form-control" required
                                                            maxlength="120" minlength="4" />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="text" id="alamatterkini" name="alamatterkini"
                                                            placeholder="Alamat Terkini" class="form-control" required
                                                            maxlength="120" minlength="4" />
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label for="tinggal">Status Tinggal:</label>
                                                        <select name="tinggal" id="tinggal">
                                                            <option value="sementara">Sementara</option>
                                                            <option value="menetap">Menetap</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label for="rw">RT:</label>
                                                        <select name="rtrw" id="rtrw">
                                                            <option value="01/01">01/01</option>
                                                            <option value="02/01">02/01</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <label for="rw">RW:</label>
                                                        <select name="rtrw" id="rtrw">
                                                            <option value="01/01">01/01</option>
                                                            <option value="02/01">02/01</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="hidden" name="status" id="status" value="tamu" />
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                    <button type="submit" value="register"
                                                        class="btn btn-primary btn-lg">Register</button>
                                                </div>

                                            </form>

                                        </div>
                                        <div
                                            class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                            <img src="/sbadmin/assets/img/1.png" class="img-fluid" alt="Sample image">

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