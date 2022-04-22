@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<!-- Slider Start -->
<section class="slider">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-10">
                <div class="block">
                    <span class="d-block mb-3 text-white text-capitalize">Sistem Informasi</span>
                    <h1 class="animated fadeInUp mb-5">Pelayanan <br>Rukun Tetangga.
                    </h1>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Intro Start -->

<section class="section intro">
</section>

<!-- Section Intro END -->
<!-- Section About Start -->

<section class="section about position-relative">
    <div class="bg-about"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 offset-md-0">
                <div class="about-item ">
                    <div class="">
                        <h4 class="mb-3 position-relative">RT-KU</h4>
                        <p class="mb-5">Aplikasi RT-KU merupakan aplikasi yang bertujuan untuk membantu
                            mempermudah tugas-tugas rutin Pengurus Rumah Tangga (RT) dalam menata administrasi
                            warga maupun keuangan sehingga menjadi lebih transparan.
                            Dari aplikasi ini juga diharapkan dapat mempererat hubungan antar warga, menumbuhkan
                            rasa persaudaraan antar warga, saling mengenal, saling peduli dan
                            saling berbagi informasidengan warga sekitar khususnya tetangga di lingkungannya..
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br><br><br>

<!-- Section About Start -->
<section class="section about-2 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about-item pr-3 mb-5 mb-lg-0">
                    <h2 class="mt-3 mb-4 position-relative content-title">NAMA PAK RT
                    </h2>
                    <p class="mb-5">Deskripsi singkat pak RT.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-item-img">
                    <img src="{{asset('/superwarga/assets/img/1.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section About End -->

<section class="about-info section pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md ">Visi</span></h3>
                    <p>llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque
                        maxime
                        sunt deleniti voluptas distinctio .</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md">Misi</span></h3>
                    <p>llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque
                        maxime
                        sunt deleniti voluptas distinctio .</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Layanan</span>
                    <h2 class="mt-3 content-title ">Layanan Rukun Tetangga</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-desktop"></i>
                    <h4 class="mb-3">Catatan Kependudukan.</h4>
                    <p>Catatan kependudukan yang disimpan didalam database guna meminimalisir kerusakan atau kehilangan data pada data yang dicatat pada buku kependudukan</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-layers"></i>
                    <h4 class="mb-3">Digitalisasi layanan surat.</h4>
                    <p>Digitalisasi layanan surat menyurat guna mempermudah dapat permohonan surat dan mengurangi kontak fisik selama pandemi</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-bar-chart"></i>
                    <h4 class="mb-3">Dokumentasi Kegiatan.</h4>
                    <p>Dokumentasi berupa foto dan video kegiatan </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5 mb-lg-0">
                    <i class="ti-vector"></i>
                    <h4 class="mb-3">Informasi berita internal .</h4>
                    <p>Informasi berita internal warga mengenai informasi data warga, berita atau pengumuman, kegiatan, keuangan serta keamanan</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5 mb-lg-0">
                    <i class="ti-android"></i>
                    <h4 class="mb-3">Pengaduan / Pelaporan Warga.</h4>
                    <p>Layanan pengaduan / pelaporan mengenai lingkungan sekitar</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-lg-8">
                <div class="section-title">
                    <span class="h6 text-color ">Fitur Aplikasi</span>
                    <h2 class="mt-3 content-title">Fitur Aplikasi RT-KU </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="intro-item mb-5 mb-lg-0">
                    <i class="ti-desktop color-one"></i>
                    <h4 class="mt-4 mb-3">Warga</h4>
                    <p>Fitur ini berfungsi untuk pengelolaan data dan penyajian informasi yang terkait
                                    dengan warga, mulai dari kelahiran, warga tetap, warga pendatang, warga pindah
                                    alamat, tamu warga, kematian, serta fasilitas-fasilitas lain yang dapat diakses
                                    langsung oleh warga.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item mb-5 mb-lg-0">
                    <i class="ti-medall color-one"></i>
                    <h4 class="mt-4 mb-3">Keuangan</h4>
                    <p>Fitur ini berfungsi untuk mempermudah dan mempercepat proses pencatatan dan
                                    pengelolaan transaksi - transaksi keuangan yang dikelola oleh Pengurus RT, sehingga
                                    tata kelola administrasi keuangan RT akan lebih tertib, transparan dan tertata
                                    dengan baik.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item">
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Admin</h4>
                    <p>Fitur ini hanya diperuntukkan bagi Pengurus RT untuk mempersiapkan data-data yang
                                    diperlukan, monitoring data, modifikasi data, setting dan konfigurasi, sehingga
                                    mempermudah proses pendataan dan penyajian informasi akan menjadi valid dan selalu
                                    uptodate.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item">
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Admin</h4>
                    <p>Fitur ini hanya diperuntukkan bagi Pengurus RT untuk mempersiapkan data-data yang
                                    diperlukan, monitoring data, modifikasi data, setting dan konfigurasi, sehingga
                                    mempermudah proses pendataan dan penyajian informasi akan menjadi valid dan selalu
                                    uptodate.</p>
                </div>
            </div> 
            <div class="col-lg-4 col-md-6">
                
            </div>
            <div class="col-lg-4 col-md-6">
                
            </div>
        </div>
    </div>
</section>

<!-- Section About End -->
<!--  Section Services Start -->
<section class="section service border-top">
</section>
<!--  Section Services End -->
<!-- Section Cta Start -->
<section class="section cta">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cta-item  bg-white p-5 rounded">
                    <span class="h6 text-color">Hubungi Kami</span>
                    <h2 class="mt-2 mb-4">Hubungi Kami Untuk Informasi Lebih Lanjut</h2>
                    <h3><i class="ti-mobile mr-3 text-color"></i>0877-2235-0785</h3>
                </div>
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