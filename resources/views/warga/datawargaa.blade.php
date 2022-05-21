@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<section class="page-title bg-datawarga">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <span class="text-white">Informasi </span>
                    <h1 class="text-capitalize mb-4 text-lg">Informasi Data Warga</h1>

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
                    <h2 class="mt-3 content-title ">Informasi Data Warga</h2>
                </div>
            </div>
        </div>
        <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Data Kependudukan Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                     @foreach($detail_users as $p)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->telpon }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Agama
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Islam</th>
                            <th>Kristen Protestan</th>
                            <th>Katolik</th>
                            <th>Hindu</th>
                            <th>Budha</th>
                            <th>Kong Hu Cu</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$islam}}</td>
                            <td>{{$protestan}}</td>
                            <td>{{$katholik}}</td>
                            <td>{{$hindu}}</td>
                            <td>{{$buddha}}</td>
                            <td>{{$konghucu}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Kewarganegaraan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Warga Negara Indonesia</th>
                            <th>Warga Negara Asing</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$WNI}}</td>
                            <td>{{$WNA}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
           Jumlah  Data Warga Berdasarkan Status Pernikahan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Menikah</th>
                            <th>Belum Menikah</th>
                            <th>Cerai</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$Menikah}}</td>
                            <td>{{$Belum_Menikah}}</td>
                            <td>{{$Cerai}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Jumlah Data Warga Berdasarkan Usia
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="usia-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>0-10</th>
                            <th>10-25</th>
                            <th>25-40</th>
                            <th>40-60</th>
                            <th>60></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Jumlah Data Warga Berdasarkan Jenis Kelamin
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="jeniskelamin-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                        </tr>
                    </thead>
                    <tbody>
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{$lakilaki}}</td>
                            <td>{{$perempuan}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Permohonan Kartu Akses Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="satu">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>Nomer Plat Kendaraan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Alamat</th>
                            <th>Status Pengajuan</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($kendaraan as $p)
				@php $i=1 @endphp
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->nopol }}</td>
                            <td>{{ $p->jeniskendaraan }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td>{{ $p->statuspermohonan }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('/sbadmin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js')}}" crossorigin=" anonymous">
    </script>
    <script src="{{asset('/sbadmin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/sbadmin/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('/sbadmin/js/datatables-simple-demo.js')}}"></script>
    
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