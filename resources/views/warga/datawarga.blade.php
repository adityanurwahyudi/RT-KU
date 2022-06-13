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
                        <form action="{{ route('warga.storekendaraan') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <center>
                                <h3 class="text-md mb-4">Form Kartu Akses Kendaraan</h3>
                            </center>
                            <div class="form-group">
                            <input id="nama" name="nama" class="form-control" value="{{ $users->name }}" placeholder="Nama Pemilik">
                          
                        </div>
                        <div class="form-group">
                            <input id="nopol" name="nopol" type="text" class="form-control"
                                placeholder="Nomor Plat Kendaraan">
                        </div>
                                <input value="mobil" id="jeniskendaraan" name="jeniskendaraan" type="hidden" class="form-control">
                                <input value="Baru" id="statuspermohonan" name="statuspermohonan" type="hidden" class="form-control">
                            <div class="form-group-2 mb-4">
                                <textarea id="alamat" name="alamat" value="{{ $users->alamat}}" class="form-control" rows="4"
                                    placeholder="Alamat">{{ $users->alamat}}</textarea>
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
        <form action="{{ route('warga.datadiri_update') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
                       <div class="form-group">
                       <font color="#000000">NIK </font><br>
                           <input required id="nik" name="nik" type="text" onchange="cekNik()" onkeyup="Number('nik','Hanya bisa number')" value="{{ $users->nik }}" class="form-control"placeholder="Nomor Induk Kependudukan" >
                       </div>
                       <div class="form-group">
                       <font color="#000000">Kewarganegaraan </font><br>
        
                        <input type="radio" name="kewarganegaraan" value="WNI" 
                        {{ $users->kewarganegaraan == 'WNI' ? 'checked' : '' }}
                        >Warga Negara Indonesia
                        <input type="radio" name="kewarganegaraan" value="WNA"
                        {{ $users->kewarganegaraan == 'WNA' ? 'checked' : '' }}
                        >Warga Negara Asing
                        </div> 
                      
                       <div class="form-group">
                       <font color="#000000">No Kartu Keluarga</font><br>
                           <input required for="nokk" id="nokk"  onkeyup="Number('nokk','Hanya bisa number')" name="nokk"  value="{{ $users->nokk }}"  type="text" class="form-control" placeholder="Nomor Kartu Keluarga">
                       </div>
                       <div class="form-group">
                       <font color="#000000">Jenis Kelamin </font><br>
                        <input type="radio" name="jeniskelamin" value="Laki-laki"
                         {{ ($users->jeniskelamin == 'Laki-laki') ? 'checked' : '' }}
                        >Laki-Laki
                        <input type="radio" name="jeniskelamin" value="Perempuan" {{ ($users->jeniskelamin == 'Perempuan') ? 'checked' : '' }}
                        >Perempuan
                        </div>
                       <div class="form-group">
                       <font color="#000000">Pekerjaan :</font><br>
                           <input id="pekerjaan" onkeyup="Alphabet('pekerjaan','Pekerjaan Harus Huruf')" name="pekerjaan" type="text"  value="{{ $users->pekerjaan }}"  class="form-control"
                               placeholder="Pekerjaan" required>
                       </div>
                       <div class="form-group">
                       <font color="#000000">Tanggal Lahir </font>
                           <input id="tanggallahir" name="tanggallahir" type="text" value="{{ $users->tanggallahir }}" class="form-control"placeholder="tanggal lahir">
                            </div>
                            <div class="form-group">
                           <input id="usia" name="usia" type="tel" value="{{ $users->usia }}" class="form-control"
                               placeholder="Usia" readonly>
                       </div>
                       <div class="form-group">
                       <font color="#000000">Status </font><br>
                          <select  class="form-control" id="statuspernikahan" value="{{ $users->statuspernikahan }}"  name="statuspernikahan" for="statuspernikahan">
                        <option value="Menikah"{{ ($users->statuspernikahan == 'Menikah') ? 'selected' : '' }}>Menikah</option>
                        <option value="Belum_Menikah"{{ ($users->statuspernikahan == 'Belum_Menikah') ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Cerai"{{ ($users->statuspernikahan == 'Cerai') ? 'selected' : '' }}>Cerai</optionv>
                          </select> 
                        </div>
                       <div class="form-group">
                       <font color="#000000">Agama  </font><br>
                          <select  class="form-control" id="agama"   name="agama" for="agama">
                        <option value="islam" @if($users->agama == 'islam') selected @endif >Islam</option>
                        <option value="protestan" @if($users->agama == 'protestan') selected @endif >Protestan</option>
                        <option value="katholik" @if($users->agama == 'katholik') selected @endif>Khatolik</optionv>
                        <option value="buddha" @if($users->agama == 'buddha') selected @endif>Buddha</option>
                        <option value="khonghucu" @if($users->agama == 'khonghucu') selected @endif>Khonghucu</option>
                          </select>
                        </div> 
                           <div class="form-group-2 mb-4">
                       <font color="#000000">Alamat </font><br>
                               <textarea id="alamat" name="alamat"  value="{{ $users->alamat }}" class="form-control" rows="4"
                                   placeholder="Alamat" required>{{ $users->alamat }} </textarea>
                           </div>
                           
                        <center>
                           <button class="btn btn-main"  name="submit" type="submit"><i class="fa fa-save"></i> Simpan</button>
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
<!-- Validasi JavaScript -->
<script language="JavaScript">
            function Alphabet(id, pesan) {
                
                var nilai = document.getElementById(id);
                var alphaExp = /^[a-zA-Z]+$/\s;
                if(nilai.value!= ''){
                
                if(nilai.value.match(alphaExp)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    nilai.value='';
                    return false;
                }
            }
            }
            function Number(id, pesan) {
                var nilai = document.getElementById(id);
                var numberExp = /^[0-9]+$/;
                if(nilai.value!= ''){
                    
                if(nilai.value.match(numberExp)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    nilai.value='';
                    return false;
                }

                }
                
            }
            function cekEmail(nilai, pesan) {
                var email = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
                if(nilai.value.match(email)) {
                    return true;
                }
                else {
                    alert(pesan);
                    nilai.focus();
                    return false;
                }
            }
    
            function cekNik(){
              var nik = $('#nik').val();
              $.get("{{ URL::to('warga/datawarga/nik') }}",{nik:nik},
              function(res){
                  if(res == 1){
                    alert('Data Sudah Ada');
                    $('#nik').val('');
                  }
              });
            }
        
        </script>
        
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
    <script>
        $(function() {
            //$( "#tanggallahir" ).date();
            flatpickr("#tanggallahir", {
                 enableTime: false,
                 dateFormat: "Y-m-d ",
                 maxDate: "today"
                });
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
@endsection