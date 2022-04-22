@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Tentang Kami</span>
                    <h1 class="text-capitalize mb-4 text-lg">Profile</h1>

                </div>
            </div>
        </div>
    </div>
</section>


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
                    <p>1.  wkwkwkw</p>
                    <p>2.  wkwkwkw</p>
                    <p>3.  wkwkwkw</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md">Misi</span></h3>
                    <p>1.  wkwkwkw</p>
                    <p>2.  wkwkwkw</p>
                    <p>3.  wkwkwkw</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Section Services Start -->
<section class="section team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Struktur Organisasi</span>
                    <h2 class="mt-3 content-title">Struktur Organisasi Pada RT </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <img src="{{asset('/superwarga/assets/img/1.jpg')}}" width="500" height="500">

        </div>
    </div>
</section>
<!--  Section Services End -->

<section class="mt-70 position-relative">
    <div class="container">
        <div class="cta-block-2 bg-gray p-5 rounded border-1">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-7">
                    <span class="text-color">Hubungi Kami</span>
                    <h2 class="mt-2 mb-4 mb-lg-0">Hubungi Kami Untuk Informasi Lebih Lanjut</h2>
                </div>
                <div class="col-lg-4">
                    <a href="tel:+6287722350785" class="btn btn-main btn-round-full float-lg-right ">Hubungi
                        Kami</a>
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