@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Kriteria</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Tabel Kriteria</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Kepentingan(W) Dari Setiap Kriteria
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kepentingan-table">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>
                            <th>Bobot Rating Kepentingan</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Penghasilan</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Jumlah Tanggungan</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>Kendaraan</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Penghasilan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="penghasilan-table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>C1</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($master_penghasilan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->keterangan }}  </td>
                            <td> {{ $p->bobot }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Pekerjaan
        </div>
        <div class="card-body">
            <a href="{{ route('admin.rt.pekerjaan.tambah') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
            <br><br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="pekerjaan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>C2</th>
                            <th>Bobot (W)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($master_pekerjaan as $p)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td> {{ $p->keterangan }} </td>
                            <td> {{ $p->bobot }} </td>
                            <td>
                            <a title="Edit" href="{{route('admin.rt.pekerjaan.edit',$p->id)}}"  class="btn btn-info"> <i class="fa fa-edit"></i> Edit</a>
                            <a title="Delete" href="{{route('admin.rt.pekerjaan.hapus',$p->id)}}"  class="btn btn-danger"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"> <i class="fa fa-trash"></i> Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Jumlah Tanggungan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="tanggungan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>C3</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($master_jumlah_tanggungan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td> {{ $p->bobot }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Kendaraan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kendaraan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>C4</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($master_kendaraan as $p)
                        <tr>
                            <td>{{ $nO++ }}</td>
                            <td> {{ $p->keterangan }}</td>
                            <td>  {{ $p->bobot }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script type="text/javascript">
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
@endsection