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
                        <h1 class="text-capitalize mb-4 text-lg">Profil Warga</h1>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-wrap section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form class="form-akun" method="post" action="{{ route('warga.profil_update') }}">
                    @csrf
                        <center>
                            <h3 class="text-md mb-4">Akun Warga</h3>
                        </center>
                        <input type="hidden" id="id" name="id" value="{{ $users->id }}">
                        <div class="form-group" style="display:none;">
                            <label>Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $users->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ $users->password_real }}" required>
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