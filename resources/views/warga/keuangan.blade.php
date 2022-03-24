@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Laporan Keuangan</span>
                    <h1 class="text-capitalize mb-4 text-lg">Keuangan Warga</h1>

                </div>
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
                    <span class="h6 text-color">Keuangan</span>
                    <h2 class="mt-3 content-title ">Tabel Laporan Keuangan</h2>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Laporan Keuangan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Bukti</th>
                            <th>Keterangan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Total Saldo</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>Salary</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-7 text-center">
            <div class="section-title">
                <h2 class="mt-3 content-title">Scan untuk pembayaran kas</h2>
            </div>
        </div>
    </div>
    <center>
        <img src="/sbwarga/images/qrcode.jpeg" width="200" height="250">
    </center>
    <div class="tengah">
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" onclick="document.getElementById('id01').style.display='block'"
                class="btn btn-dark centerr-block">Konfirmasi
                Pembayaran</button>
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