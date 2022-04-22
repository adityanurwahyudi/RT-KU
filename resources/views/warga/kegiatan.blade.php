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
                    @foreach($kegiatan as $p)
            <div class="col-lg-6 col-md-6 mb-5">
                <div class="blog-item">
                    <img src="{{asset('upload/kegiatan/'.$p->gambar)}}" alt="" class="img-fluid rounded">

                    <div class="blog-item-content bg-white p-5">
                        <div class="blog-item-meta bg-gray py-1 px-2">

                            <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i>{{ $p->tanggal }}</span>
                        </div>

                        <h3 class="mt-3 mb-3"><a href="blog-single.html">{{ $p->nama }}</a>
                        </h3>
                        <p class="mb-4">{{ $p->deskripsi }}</p>
                    </div>
                </div>
            </div>
                        @endforeach
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