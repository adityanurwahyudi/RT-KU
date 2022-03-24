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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <br><br><br><br><br><br><br><br><br><br>
                    <span class="h6 text-color">Our Services</span>
                    <h2 class="mt-3 content-title ">We provide a wide range of creative services </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-desktop"></i>
                    <h4 class="mb-3">Web development.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-layers"></i>
                    <h4 class="mb-3">Interface Design.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5">
                    <i class="ti-bar-chart"></i>
                    <h4 class="mb-3">Business Consulting.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5 mb-lg-0">
                    <i class="ti-vector"></i>
                    <h4 class="mb-3">Branding.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5 mb-lg-0">
                    <i class="ti-android"></i>
                    <h4 class="mb-3">App development.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="service-item mb-5 mb-lg-0">
                    <i class="ti-pencil-alt"></i>
                    <h4 class="mb-3">Content creation.</h4>
                    <p>A digital agency isn't here to replace your internal team, we're here to partner</p>
                </div>
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
                    <h4 class="mt-4 mb-3">Modern & Responsive design</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item mb-5 mb-lg-0">
                    <i class="ti-medall color-one"></i>
                    <h4 class="mt-4 mb-3">Awarded licensed company</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="intro-item">
                    <i class="ti-layers-alt color-one"></i>
                    <h4 class="mt-4 mb-3">Build your website Professionally</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                </div>
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
                    <h2 class="mt-2 mb-4">Hubungi Kami Untuk Informasi Lebih Lengkap</h2>
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