@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Galeri Kegiatan</span>
                    <h1 class="text-capitalize mb-4 text-lg">Galeri</h1>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- section portfolio start -->
<section class="section portfolio pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Foto</span>
                    <h2 class="mt-3 content-title ">Foto-Foto Kegiatan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="responsive">
        <div class="img" class="card h-100">
            <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Trolltunga Norway" width="300" height="200">
        </div>
    </div>
    <div class="responsive">
        <div class="img">
            <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Forest" width="300" height="200">
        </div>
    </div>
    <div class="responsive">
        <div class="img">
            <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Northern Lights" width="300" height="200">
        </div>
    </div>
    <div class="responsive">
        <div class="img">
            <img src="https://www.w3schools.com/css/img_lights.jpg" alt="Mountains" width="300" height="200">
        </div>
    </div>

    <div class="clearfix">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 text-center">
                <nav class="navigation pagination d-inline-block">
                    <div class="nav-links">
                        <a class="prev page-numbers" href="#">Prev</a>
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="next page-numbers" href="#">Next</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">×</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

</section>

<section class="section portfolio pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Video</span>
                    <h2 class="mt-3 content-title ">Video Kegiatan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-inner py-4">
        <!-- Single item -->
        <div class="carousel-item active">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 responsive">
                        <div class="card">
                            <img src="/sbwarga/images/ied.jpg" class="card-img-top img-responsive" alt="Waterfall" />
                            <center>
                                <h4 class="card-title">John Doe</h4>
                            </center>
                        </div>
                    </div>

                    <div class="col-lg-4  d-lg-block responsive">
                        <div class="card">
                            <img src="/sbwarga/images/17agustus.jpg" class="card-img-top" alt="Sunset Over the Sea" />
                            <center>
                                <h4 class="card-title">John Doe</h4>
                            </center>
                        </div>
                    </div>

                    <div class="col-lg-4  d-lg-block responsive">
                        <div class="card">
                            <img src="/sbwarga/images/bersih.jpg" class="card-img-top" alt="Sunset over the Sea" />
                            <center>
                                <h4 class="card-title">John Doe</h4>
                            </center>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 text-center">
            <nav class="navigation pagination d-inline-block">
                <div class="nav-links">
                    <a class="prev page-numbers" href="#">Prev</a>
                    <span aria-current="page" class="page-numbers current">1</span>
                    <a class="page-numbers" href="#">2</a>
                    <a class="next page-numbers" href="#">Next</a>
                </div>
            </nav>
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