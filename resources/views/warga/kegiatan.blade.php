@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Kegiatan</span>
                    <h1 class="text-capitalize mb-4 text-lg">Agenda Kegiatan</h1>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="blog-item">
                    <img src="/sbwarga/images/blog/1.jpg" alt="" class="img-fluid rounded">

                    <div class="blog-item-content bg-white p-5">
                        <div class="blog-item-meta bg-gray py-1 px-2">

                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th
                                January</span>
                        </div>

                        <h3 class="mt-3 mb-3"><a href="blog-single.html">Improve design with typography?</a>
                        </h3>
                        <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi.
                            Consectetur accusantium pariatur repudiandae!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-5">
                <div class="blog-item">
                    <img src="/sbwarga/images/blog/2.jpg" alt="" class="img-fluid rounded">

                    <div class="blog-item-content bg-white p-5">
                        <div class="blog-item-meta bg-gray py-1 px-2">

                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th
                                January</span>
                        </div>

                        <h3 class="mt-3 mb-3"><a href="blog-single.html">Interactivity connect consumer</a>
                        </h3>
                        <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi.
                            Consectetur accusantium pariatur repudiandae!</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-5">
                <div class="blog-item">
                    <img src="/sbwarga/images/blog/3.jpg" alt="" class="img-fluid rounded">

                    <div class="blog-item-content bg-white p-5">
                        <div class="blog-item-meta bg-gray py-1 px-2">

                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th
                                January</span>
                        </div>

                        <h3 class="mt-3 mb-3"><a href="blog-single.html">Marketing Strategy to bring more
                                affect</a></h3>
                        <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi.
                            Consectetur accusantium pariatur repudiandae!</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="blog-item">
                    <img src="/sbwarga/images/blog/4.jpg" alt="" class="img-fluid rounded">

                    <div class="blog-item-content bg-white p-5">
                        <div class="blog-item-meta bg-gray py-1 px-2">

                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> 28th
                                January</span>
                        </div>

                        <h3 class="mt-3 mb-3"><a href="blog-single.html">Marketing Strategy to bring more
                                affect</a></h3>
                        <p class="mb-4">Non illo quas blanditiis repellendus laboriosam minima animi.
                            Consectetur accusantium pariatur repudiandae!</p>

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