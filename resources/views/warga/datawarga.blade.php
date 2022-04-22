@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Formulir</span>
                        <h1 class="text-capitalize mb-4 text-lg">Formulir Data Warga</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-wrap section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <form action="{{ route('admin.rt.kendaraan.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <center>
                                <h3 class="text-md mb-4">Form Kartu Akses Kendaraan</h3>
                            </center>
                            <div class="form-group">
                            <input id="nama" name="nama" class="form-control" placeholder="Nama Pemilik">
                        </div>
                        <div class="form-group">
                            <input id="nopol" name="nopol" type="text" class="form-control"
                                placeholder="Nomor Plat Kendaraan">
                        </div>
                                <input value="mobil" id="jeniskendaraan" name="jeniskendaraan" type="hidden" class="form-control">
                                <input value="Baru" id="status" name="status" type="hidden" class="form-control">
                            <div class="form-group-2 mb-4">
                                <textarea id="alamat" name="alamat" class="form-control" rows="4"
                                    placeholder="Alamat"></textarea>
                            </div>
                            <button class="btn btn-main" name="submit" type="submit">Kirim</button>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                        <form class="contact__form" method="post" action="{{ route('warga.datawarga_update') }}">
                    @csrf
                        <center>
                            <h3 class="text-md mb-4">Form Permohonan Bansos</h3>
                        </center>
                        <div class="form-group">
                            <label>Jumlah Tanggungan</label>
                            <select class="form-control" id="jumlah" name="jumlah" required>
                                <option value="" selected>-- Pilih Jumlah Tanggungan --</option>
                                @foreach($tanggungan as $val)
                                <option value="{{ $val->id }}" @if(isset($users)) @if($users->id_jumlah_tanggungan==$val->id) selected @endif @endif>
                                    {{ $val->keterangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Penghasilan</label>
                            <select class="form-control" id="penghasilan" name="penghasilan" required>
                                <option value="" selected>-- Pilih Penghasilan --</option>
                                @foreach($penghasilan as $val)
                                <option value="{{ $val->id }}" @if(isset($users)) @if($users->id_penghasilan==$val->id) selected @endif @endif>
                                    {{ $val->keterangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <select class="form-control" id="pekerjaaan" name="pekerjaaan" required>
                                <option value="" selected>-- Pilih Pekerjaan --</option>
                                @foreach($pekerjaan as $val)
                                <option value="{{ $val->id }}" @if(isset($users)) @if($users->id_pekerjaan==$val->id) selected @endif @endif>
                                    {{ $val->keterangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kendaraan</label>
                            <select class="form-control" id="kendaraan" name="kendaraan" required>
                                <option value="" selected>-- Pilih Kendaraan --</option>
                                @foreach($kendaraan as $val)
                                <option value="{{ $val->id }}" @if(isset($users)) @if($users->id_kendaraan==$val->id) selected @endif @endif>
                                    {{ $val->keterangan }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-main" name="submit" type="submit">Simpan</button>
                    </form>
                        
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                <form method="post" action="mail.php"enctype="multipart/form-data">
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
                                <h3 class="text-md mb-4">Form Data Diri</h3>
                            </center>
                            
                        <div class="form-group">
                            <input id="nama" name="nama" type="text" class="form-control"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <input id="nik" name="nik" type="text" class="form-control"
                                placeholder="Nomor Induk Kependudukan">
                        </div>
                        <div class="form-group">
                            <input id="kk" name="kk" class="form-control" placeholder="Nomor Kartu Keluarga">
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" type="email" class="form-control"
                                placeholder="Alamat E-mail">
                        </div>
                            <div class="form-group">
                                <input id="telepon" name="telepon" type="tel" class="form-control"
                                    placeholder="Nomer Handphone">
                            </div>
                            <div class="form-group">
                                <input id="tanggallahir" name="tanggallahir" type="date" class="form-control"
                                    placeholder="tanggal lahir">
                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea id="alamat" name="alamat" class="form-control" rows="4"
                                    placeholder="Alamat"></textarea>
                            </div>
                            <button class="btn btn-main" name="submit" type="submit">Kirim</button>
                        </form>
                </div>
            </div>
            
        </div>
    </section>
    
@endsection

@section('script')


@include('sweetalert::alert')

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