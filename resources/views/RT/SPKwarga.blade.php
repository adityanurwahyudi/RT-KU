@extends('template.backend.main')

@section('css')
    <style>
        .badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }
        .badge-success {
            color: #fff;
            background-color: #28a745;
        }
        .badge-warning {
            color: #212529;
            background-color: #ffc107;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">SPK Penentuan Warga Tidak Mampu</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">SPK Penentuan Warga Tidak Mampu </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Warga Tidak Mampu
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Penghasilan</th>
                            <th>Pekerjaan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Kendaraan</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $val)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ ($val->id_penghasilan) ? getPenghasilan($val->id_penghasilan)->keterangan : '' }}</td>
                            <td>{{ ($val->id_pekerjaan) ? getPekerjaan($val->id_pekerjaan)->keterangan : '' }}</td>
                            <td>{{ ($val->id_jumlah_tanggungan) ? getJumlahTanggungan($val->id_jumlah_tanggungan)->keterangan : '' }}</td>
                            <td>{{ ($val->id_kendaraan) ? getKendaraan($val->id_kendaraan)->keterangan : '' }}</td>
                            {{-- <td>
                                <a title="Edit" href="" class="btn btn-info">Edit</a>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td> --}}
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
            Matriks Keputusan X
        </div>
        <div class="card-body">
            <div class="table-responsive">
                {{-- <a href="/tidakmampu/tambah" class="btn btn-primary">Add</a>
                <br><br> --}}
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Penghasilan</th>
                            <th>Pekerjaan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Kendaraan</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
				@php $No=1 @endphp
                        @foreach($users as $val)
                        <tr>
                            <td>{{ $No++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ !empty($val->id_penghasilan) ? number_format(getPenghasilan($val->id_penghasilan)->bobot,2) : '' }}</td>
                            <td>{{ !empty($val->id_pekerjaan) ? number_format(getPekerjaan($val->id_pekerjaan)->bobot,2) : '' }}</td>
                            <td>{{ !empty($val->id_jumlah_tanggungan) ? number_format(getJumlahTanggungan($val->id_jumlah_tanggungan)->bobot,2) : '' }}</td>
                            <td>{{ !empty($val->id_kendaraan) ? number_format(getKendaraan($val->id_kendaraan)->bobot,2) : '' }}</td>
                            {{-- <td>
                                <a title="Edit" href="" class="btn btn-info">Edit</a>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td> --}}
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
            Tabel Normalisasi Matriks
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="satu">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>R1</th>
                            <th>R2</th>
                            <th>R3</th>
                            <th>R4</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($normalisasi as $val)
                        <tr>
                            <td>{{ $no_normalisasi++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->penghasilan }}</td>
                            <td>{{ $val->pekerjaan }}</td>
                            <td>{{ $val->jumlah_tanggungan }}</td>
                            <td>{{ $val->kendaraan }}</td>
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
            Hasil Perangkingan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="dua">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Rank</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($normalisasi as $key=>$val)
                        <tr>
                            <td>{{ $no_rank++ }}</td>
                            <td>{{ $val->name }}</td>
                            <td>{{ $val->rank }}</td>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @if($val->rank > $kepentingan)
                                    <span class="badge badge-success">Layak</span>
                                @else
                                    <span class="badge badge-warning">Tidak Layak</span>
                                @endif
                            </td>
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
@endsection