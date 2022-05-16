@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-profile2">
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
                    @foreach($profile as $p)
            <div class="col-lg-6 col-md-6">
                <div class="about-item pr-3 mb-5 mb-lg-0">
                    <br><br><br><br><br><br>
                    <h2 class="mt-3 mb-4 position-relative content-title">{{ $p->nama }}
                    </h2>
                    <p class="mb-5"><br><br>{{ $p->deskripsi }}</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-item-img">
                <br><br><br>
                    <img src="{{asset('upload/profile/'.$p->profilert)}}" width="400" height="200"class="img-fluid">
                </div>
            </div>
        </div>
    </div>
<br><br><br><br>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md ">Alamat</span></h3>
                    <h4>{{ $p->alamat }}.</h4>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="about-info-item mb-4 mb-lg-0">
                    <h3 class="mb-3"><span class="text-color mr-2 text-md">Nomer Telepon</span></h3>
                    <h4>{{ $p->telepon }}.</h4>
                </div>
            </div>
        </div>
<br><br>
<!--  Section Services Start -->
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
            <img src="{{asset('upload/profile/'.$p->strukturorganisasi)}}" width="500" height="500">

        </div>
                        @endforeach
    </div>
</section>

<!--  Section Services End -->
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