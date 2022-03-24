@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-1">
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
                    <form id="contact-form" class="contact__form" method="post" action="mail.php">
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
                            <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control"
                                placeholder="Alamat E-Mail">
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="tel" class="form-control"
                                placeholder="Nomor Handphone">
                        </div>
                        <div class="form-group-2 mb-4">
                            <textarea id="kritiksaran" name="kritiksaran" class="form-control" rows="4"
                                placeholder="Kritik dan Saran"></textarea>
                        </div>
                        <button class="btn btn-main" name="submit" type="submit">Kirim</button>
                    </form>
                </div>

                <div class="col-lg-5 col-sm-12">
                    <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                        <center>
                            <h2 class="mb-5 mt-2">Hubungi Kami</h2>
                        </center>
                        <!--Card content-->
                        <!--Google map-->
                        <div id="map-container-google-8" class="z-depth-1-half map-container-5" style="height: 350px">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d589.2122306812672!2d106.86157012434987!3d-6.555526114359381!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c74b5a8e24bb%3A0xffff055db8281c5e!2sBude%20Frozen%20Store!5e0!3m2!1sen!2sid!4v1646805800646!5m2!1sen!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <br>
                    <ul class="address-block list-unstyled center">
                        <li>
                            <i class="ti-direction mr-3"></i>Griya Alam Sentul A8/5
                        </li>
                        <li>
                            <i class="ti-email mr-3"></i>Email: RT01GriyaAlam@gmail.com
                        </li>
                        <li>
                            <i class="ti-mobile mr-3"></i>Phone:+6277-2235-0785
                        </li>
                    </ul>
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
                <div class="testimonial-item position-relative">
                    <i class="ti-quote-left text-color"></i>

                    <div class="testimonial-item-content">
                        <p class="testimonial-text">Quam maiores perspiciatis temporibus odio reiciendis error alias
                            debitis atque consequuntur natus iusto recusandae numquam corrupti facilis blanditiis.
                        </p>

                        <div class="testimonial-author">
                            <h5 class="mb-0 text-capitalize">Thomas Johnson</h5>

                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative">
                    <i class="ti-quote-left text-color"></i>

                    <div class="testimonial-item-content">
                        <p class="testimonial-text">Consectetur adipisicing elit. Quam maiores perspiciatis
                            temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae
                            .</p>

                        <div class="testimonial-author">
                            <h5 class="mb-0 text-capitalize">Mickel hussy</h5>

                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative">
                    <i class="ti-quote-left text-color"></i>

                    <div class="testimonial-item-content">
                        <p class="testimonial-text">Quam maiores perspiciatis temporibus odio reiciendis error alias
                            debitis atque consequuntur natus iusto recusandae numquam corrupti.</p>

                        <div class="testimonial-author">
                            <h5 class="mb-0 text-capitalize">James Watson</h5>

                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative">
                    <i class="ti-quote-left text-color"></i>

                    <div class="testimonial-item-content">
                        <p class="testimonial-text">Consectetur adipisicing elit. Quam maiores perspiciatis
                            temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae
                            .</p>

                        <div class="testimonial-author">
                            <h5 class="mb-0 text-capitalize">Mickel hussy</h5>

                        </div>
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