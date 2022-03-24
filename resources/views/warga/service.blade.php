@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
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