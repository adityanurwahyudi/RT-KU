@extends('template.frontend.main')

@section('css')

@endsection
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
@section('content')
    <section class="page-title bg-datawarga">
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

    <section class="contact-form-wrap section ">
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
                                <input value="Baru" id="statuspermohonan" name="statuspermohonan" type="hidden" class="form-control">
                            <div class="form-group-2 mb-4">
                                <textarea id="alamat" name="alamat" class="form-control" rows="4"
                                    placeholder="Alamat"></textarea>
                            </div>
                            <center>
                            <button class="btn btn-main " name="submit" type="submit"><i class="fa fa-save"></i> Simpan </button>
                        </center>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                        <form class="form-bansos" method="post" action="{{ route('warga.datawarga_update') }}">
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
                        <center>
                        <button class="btn btn-main " name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
                        </center>
                    </form>
                        
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="contact-form-wrap section blog-wrap ">
        <div class="container">
            <div class="row">
                <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2 class="mt-3 content-title">Formulir Data Diri</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12">
        <form action="{{ route('admin.rt.datawarga.proses') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                        <div class="form-group">
                           <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama Lengkap">
                       </div>
                       <div class="form-group">
                           <input id="nik" name="nik" type="tel"  class="form-control"
                               placeholder="Nomor Induk Kependudukan">
                       </div>
                       <div class="form-group">
                           <input for="nokk" id="nokk" name="nokk" type="tel" class="form-control" placeholder="Nomor Kartu Keluarga">
                       </div>
                       <font color="#000000">Kewarganegaraan    : </font>
                          <input type="radio" id="kewarganegaraan" name="kewarganegaraan" value="WNI"/> Warga Negara Indonesia
                          <input type="radio" id="kewarganegaraan"  name="kewarganegaraan" value="WNA"/> Warga Negara Asing
                        <br> 
                       <div class="form-group">
                           <input id="email" name="email" type="email" class="form-control"
                               placeholder="Alamat E-mail">
                       </div>
                       <font color="#000000">Status Menikah  : </font>
                          <input type="radio" id="statuspernikahan" name="statuspernikahan" value="Menikah"/> Menikah
                          <input type="radio" id="statuspernikahan"  name="statuspernikahan" value="Belum Menikah"/> Belum Menikah
                          <input type="radio" id="statuspernikahan"  name="statuspernikahan" value="cerai"/> Cerai
                        <br> 
                       <div class="form-group">
                           <input id="telepon" name="telepon" type="tel" class="form-control"
                               placeholder="Nomer Handphone">
                       </div>
                       <font color="#000000">Jenis Kelamin  :</font>
                          <input type="radio" id="jeniskelamin" name="jeniskelamin" value="Laki-laki"/> Laki-laki
                          <input type="radio" id="jeniskelamin"  name="jeniskelamin" value="Perempuan"/> Perempuan
                        <br>
                       <div class="form-group">
                           <input id="pekerjaan" name="pekerjaan" type="text" class="form-control"
                               placeholder="Pekerjaan">
                       </div>
                       <div class="form-group">
                       <font color="#000000">Tanggal Lahir  :</font>
                           <input id="tanggallahir" name="tanggallahir" type="date" class="form-control"
                               placeholder="tanggal lahir">
                               
                            </div>
                            <div class="form-group">
                           <input id="usia" name="usia" type="tel" class="form-control"
                               placeholder="Usia" readonly>
                       </div>
                       <div class="form-group">
                       <font color="#000000">Agama  :</font><br>
                          <select id="agama" name="agama" for="agama">
                        <option value="islam">Islam</option>
                        <option value="protestan">Protestan</option>
                        <option value="katholik">Khatolik</optionv>
                        <option value="buddha">Buddha</option>
                        <option value="khonghucu">Khonghucu</option>
                          </select>
                       
                        </div><br>   
                       
                       <div class="form-group">
                           
                       <font color="#000000">Foto Diri  :</font><br>
                           <input id="fotoprofile" name="fotoprofile" type="file" class="form-control"
                               placeholder="Foto Diri">
                       </div>
                           <div class="form-group-2 mb-4">
                               <textarea id="alamat" name="alamat" class="form-control" rows="4"
                                   placeholder="Alamat"></textarea>
                           </div>
                           
                        <center>
                           <button class="btn btn-main" name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
                           </center>
                       </form>
                             </div>
    </div>

                </div>
            </div>
            
        </div>
    </section>
    
@endsection

@section('script')
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#tanggallahir" ).datepicker();
        });
 
        window.onload=function(){
            $('#tanggallahir').on('change', function() {
                var dob = new Date(this.value);
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#usia').val(age);
            });
        }
 
    </script>
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
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
@endsection