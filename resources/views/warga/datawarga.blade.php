@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Data Warga</span>
                        <h1 class="text-capitalize mb-4 text-lg">Data Warga</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form class="contact__form" method="post" action="{{ route('warga.datawarga_update') }}">
                    @csrf
                        <center>
                            <h3 class="text-md mb-4">Data Warga</h3>
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