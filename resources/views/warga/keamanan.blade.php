@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Keamanan</span>
                        <h1 class="text-capitalize mb-4 text-lg">Keamanan Warga</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <span class="h6 text-color">Security</span>
                        <h2 class="mt-3 content-title">Profile Security</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/sbwarga/images/satpam4.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Card title</h5>
                                </center>
                                <center>
                                    <p class="card-text">Nomer Handphone: 0877772721712</p>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <img src="/sbwarga/images/satpam2.jfif" class="card-img-top" alt="...">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Card title</h5>
                                </center>
                                <center>
                                    <p class="card-text">Nomer Handphone: 0877772721712</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/sbwarga/images/satpam3.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">Card title</h5>
                                </center>
                                <center>
                                    <p class="card-text">Nomer Handphone: 0877772721712</p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!--  Section Services Start -->
    <section class="section service border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <span class="h6 text-color">Jadwal Ronda</span>
                        <h2 class="mt-3 content-title ">Tabel Jadwal Ronda Warga</h2>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Jadwal Ronda
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Hari</th>
                                <th>Nama Warga</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="lapor col-lg-6 col-md-12 col-sm-12 center">
                    <form id="contact-form" class="contact__form center" method="post" action="mail.php">
                        <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                            </div>
                        </div>
                        <!-- end message -->
                        <center><span class="text-color">Formulir</span></center>
                        <center>
                            <h3 class="text-md mb-4">Pengaduan / Pelaporan</h3>
                        </center>

                        <div class="form-group">
                            <input id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control"
                                placeholder="Alamat E-mail">
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="tel" class="form-control"
                                placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <labe <input name="tanggal" type="date" id="tanggal" class="form-control"
                                placeholder="Tanggal">
                        </div>
                        <div class="form-group">

                            <label for="bukti"><b>Upload Bukti</b></label><br>
                            <input id="bukti" name="bukti" type="file" class="form-control"
                                placeholder="Upload Bukti">
                        </div>
                        <div class="form-group-2 mb-4">
                            <textarea id="keterangan" name="keterangan" class="form-control" rows="4"
                                placeholder="Keterangan Pengaduan dan Laporan"></textarea>
                        </div>
                        <button class="btn btn-main" name="submit" type="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="cta-block-2 bg-gray p-5 rounded border-1">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-7">
                    <span class="text-color">Hubungi Kami</span>
                    <h2 class="mt-2 mb-4 mb-lg-0">Griya Alam Sentul A8/5 Kecamatan Babakan Madang</h2>
                </div>
                <div class="col-lg-4">
                    <a href="tel:+6287722350785" class="btn btn-main btn-round-full float-lg-right ">Hubungi
                        Kami</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@if(Session::has('success'))
<script type="text/javascript">
    Swal.fire({
        icon: 'success',
        text: '{{Session::get("success")}}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php
        Session::forget('success');
    ?>
@endif
@if(Session::has('error'))
<script type="text/javascript">
    Swal.fire({
        icon: 'error',
        text: '{{Session::get("error")}}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php
        Session::forget('error');
    ?>
@endif
@endsection