@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-keamanan2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Keamanan</span>
                        <h1 class="text-capitalize mb-4 text-lg">Keamanan Warga</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <span class="h6 text-color">Security</span>
                        <h2 class="mt-3 content-title">Profile Security</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="row row-cols-1 row-cols-md-3 g-4">

                    @foreach($security as $p)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{asset('upload/security/'.$p->gambar)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <center>
                                    <h5 class="card-title">{{ $p->nama }}</h5>
                                </center>
                                <center>
                                    <p class="card-text">Nomer Handphone:{{ $p->telepon }}</p>
                                </center>
                            </div>
                        </div>
                    </div>
                        @endforeach
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
                        <span class="h6 text-color">Jadwal Ronda</span>
                        <h2 class="mt-3 content-title ">Tabel Jadwal Ronda Warga</h2>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Jadwal Ronda
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Warga</th>
                            </tr>
                        </thead>
                        <tbody>
                     @foreach($jadwal_ronda as $p)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->name }}</td>
                            </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="lapor col-lg-6 col-md-12 col-sm-12 center">
                <form action="{{route('warga.prosespengaduan') }}"  method="post" enctype="multipart/form-data">
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
                        <center><span class="text-color">Formulir</span></center>
                        <center>
                            <h3 class="text-md mb-4">Pengaduan / Pelaporan</h3>
                        </center>
                        <div class="form-group">
                            <input id="nama" name="nama" class="form-control" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="tel" class="form-control"
                                placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                             <input name="tanggal" type="date" id="tanggal" class="form-control"
                                placeholder="Tanggal">
                        </div>
                        <div class="form-group">
                            <label for="bukti" class="form-label">Upload Bukti</label><br>
                            <input type="file" class="form-control" id="bukti" name="bukti" placeholder="Upload Bukti" required>
                        </div>
                        
                        <div class="form-group-2 mb-4">
                            <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                placeholder="Keterangan Pengaduan dan Laporan" required></textarea>
                        </div> 
                        <center>
                        <button class="btn btn-main" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>      Kirim</button>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="cta-block-2 bg-gray p-5 rounded border-1">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-7">
                    <span class="text-color">Hubungi Kami</span>
                    <h2 class="mt-2 mb-4 mb-lg-0">Hubungi Kami Untuk Informasi Lebih Lanjut</h2>
                </div>
                <div class="col-lg-4">
                     @foreach($profile as $p)
                    <a href="tel:+{{ $p->telepon }}" class="btn btn-main btn-round-full float-lg-right ">Hubungi
                        Kami</a>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('/sbadmin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin=" anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('/sbadmin/js/datatables-simple-demo.js')}}"></script>
    <script>
    // Get the modal
    var modal = document.getElementById('id01');
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = " none";
        }
    }
    </script>
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