@extends('template.frontend.main')

@section('css')
<style>
    .maps1{ 
    overflow: hidden;
    /* padding-bottom: 56.25%; */
    position: relative;
    height: 0;
    }
</style>
@endsection

@section('content')
    <section class="page-title bg-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Hubungi Kami</span>
                        <h1 class="text-capitalize mb-4 text-lg">Hubungi Kami</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                        <form action="{{ route('warga.storekritiksaran') }}"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <!-- form message -->
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                    Your message was sent successfully.
                                </div>
                            </div>
                        </div>
                        <!-- end message -->
                        <center>
                            <h3 class="text-md mb-4">Kritik dan Saran</h3>
                        </center>
                        <div class="form-group">
                            <input id="nama" name="nama" type="text" value="{{ $users->name }}" class="form-control" placeholder="Nama Lengkap"readonly>
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" value="{{ $users->email }}" class="form-control"
                                placeholder="Alamat E-Mail" readonly>
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="tel" value="{{ $users->telpon }}" class="form-control"
                                placeholder="Nomor Handphone" readonly>
                        </div>
                        <div class="form-group-2 mb-4">
                            <textarea id="kritikdansaran" name="kritikdansaran" class="form-control" rows="4"
                                placeholder="Kritik dan Saran "></textarea>
                        </div>
                        <center>
                        <button class="btn btn-main" name="submit" type="submit"> <i class="fa fa-save"></i>    Kirim</button>
                        </center>
                    </form>
                </div>

                <div class="col-lg-5 col-sm-12">
                    <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                        <center>
                            <h2 class="mb-5 mt-2">Hubungi Kami</h2>
                        </center>
                        <!--Card content-->
                        <!--Google map-->
                        <div id="map-container-google-8" class="maps1" style="height: 350px">
                            <iframe
                                src="{{ $userrt->urlmap }}"
                                width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
                        </div>
                        <!--/.Card content-->
                    </div>
                    <br>
                    <center>
                    <ul class="address-block list-unstyled center">
                        
                    @foreach($profile as $p)
                        <li>
                            <i class="ti-direction mr-3"></i>{{ $p->alamat }}
                        </li>
                        <li>
                            <i class="ti-email mr-3"></i>Email: {{ $p->email }}
                        </li>
                        <li>
                            <i class="ti-mobile mr-3"></i>Phone:{{ $p->telepon }}
                        </li>
                        @endforeach
                    </ul></center>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Testimonial Start -->
    <section class="section testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 ">
                    <div class="section-title">
                        <span class="h6 text-color">Kritik dan Saran</span>
                        <h2 class="mt-3 content-title">Kritik dan Saran dari Warga</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row testimonial-wrap">
                    @foreach($kritiksaran as $p)
                <div class="testimonial-item position-relative">
                    <i class="ti-quote-left text-color"></i>

                    <div class="testimonial-item-content">
                        <p class="testimonial-text">{{ $p->kritikdansaran }}

                        <div class="testimonial-author">
                            <h5 class="mb-0 text-capitalize">{{ $p->nama }}</h5>

                        </div>
                    </div>
                </div>
                        @endforeach
            </div>
        </div>
    </section>
@endsection

@section('script')
@section('script')
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