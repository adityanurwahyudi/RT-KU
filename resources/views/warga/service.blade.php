@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<!-- Form Surat Domisili -->
<div id="id02" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close"
                                title="Close Modal">&times;</span>
                            <img src="/loginform/images/admin.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <label for="nama"><b>Nama</b></label>
                            <input id="nama" type="text" name="nama" required>

                            <label for="nik"><b>NIK</b></label>
                            <input id="nik" type="text" name="nik" required>

                            <label for="agama"><b>Agama</b></label>
                            <input id="agama" type="text" name="agama" required>

                            <label for="tempattanggallahir"><b>Tempat/Tanggal Lahir</b></label>
                            <input id="tempattanggallahir" type="text" name="tempattanggallahir" required>

                            <label>Jenis Kelamin</label>
                            <select id="jeniskelamin" class="form-control" name="jeniskelamin">
                                <option value="lakilaki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select><br>

                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input id="pekerjaan" type="text" name="pekerjaan" required>

                            <label for="alamat"><b>Alamat Domisili</b></label>
                            <input id="alamat" type="text" name="alamat" required>
                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
                <!-- Surat Keterangan Kematian -->
                <div id="id03" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id03').style.display='none'" class="close"
                                title="Close Modal">&times;</span>
                            <img src="/loginform/images/admin.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <label for="nama"><b>Nama</b></label>
                            <input id="nama" type="text" name="nama" required>

                            <label for="tempatlahir"><b>Tempat Lahir</b></label><br>
                            <input id="tempatlahir" type="text" name=" tempatlahir" required>

                            <label for="tanggallahir"><b>Tanggal Lahir</b></label>
                            <input id="tanggallahir" type="date" name="tanggallahir" required><br>

                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input id="pekerjaan" type="text" name="pekerjaan" required>

                            <label for="agama"><b>Agama</b></label>
                            <input id="agama" type="text" name="agama" required>

                            <label for="alamat"><b>Alamat</b></label>
                            <input id="alamat" type="text" name="alamat" required>

                            <label for="hari"><b>Hari</b></label>
                            <input id="hari" type="text" name="hari" required>

                            <label for="tanggalmeninggal"><b>Tanggal Meninggal</b></label><br>
                            <input id="tanggalmeninggal" type="date" name="tanggalmeninggal" required><br>
                            <br>

                            <label for="pukul"><b>Pukul</b></label>
                            <input id="pukul" type="text" name="pukul" required>
                            <br>
                            <label for="tempat"><b>Tempat</b></label>
                            <input id="tempat" type="text" name="tempat" required>

                            <label for="makam"><b>Dimakamkan Di</b></label>
                            <input id="makam" type="text" name="makam" required>

                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Layanan Surat Menyurat</span>
                        <h1 class="text-capitalize mb-4 text-lg">Layanan</h1>

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
                        <span class="h6 text-color">Layanan Surat Menyurat</span>
                        <h2 class="mt-3 content-title ">Pelayanan Surat Menyurat</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="container">

                    <!-- Inner -->
                    <div class="carousel-inner py-4">
                        <!-- Single item -->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card h-100">
                                            <img src="/sbwarga/images/surat/domisli.jpeg"
                                                class="card-img-top img-responsive" alt="Waterfall" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Card title</h5>
                                                </center>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make
                                                    up the bulk
                                                    of the card's content.
                                                </p>
                                                <button type='button'
                                                    onclick="document.getElementById('id02').style.display='block'"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="/sbwarga/images/surat/kematian.jpg" class="card-img-top"
                                                alt="Sunset Over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Card title</h5>
                                                </center>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make
                                                    up the bulk
                                                    of the card's content.
                                                </p><button type='button'
                                                    onclick="document.getElementById('id03').style.display='block'"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="/sbwarga/images/surat/sktm.jpg" class="card-img-top"
                                                alt="Sunset over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Card title</h5>
                                                </center>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make
                                                    up the bulk
                                                    of the card's content.
                                                </p><button type='button'
                                                    onclick="document.getElementById('id04').style.display='block'"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Inner -->
                </div>
                <!-- Carousel wrapper -->
            </div>

        </div>
    </section>

    <!--  Section Services Start -->
    <section class="section service border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <span class="h6 text-color">Surat-Menyurat</span>
                        <h2 class="mt-3 content-title ">Tabel Status Pengajuan Surat</h2>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pengajuan Surat
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jenis Surat</th>
                                <th>Status Pengajuan</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    var modal = document.getElementById('id02');
    var modal = document.getElementById('id03');
    var modal = document.getElementById('id04');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('/sbadmin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin=" anonymous">
    </script>
    <script src="{{asset('/sbadmin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/sbadmin/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('/sbadmin/js/datatables-simple-demo.js')}}"></script>
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