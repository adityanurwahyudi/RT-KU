@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Keuangan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Keuangan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Laporan Pemasukan dan Pengeluaran
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('admin.rt.pemasukanpengeluaran.tambah1') }}" class="btn btn-primary">Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed"
                    id="pemasukanpengeluaran-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Bulan</th>
                            <th>Pemasukan</th>
                            <th>Metode Pembayaran</th>
                            <th>Pengeluaran</th>
                            <th>Bukti</th>
                            <th>Keterangan</th>
                            <th>Saldo Akhir</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($pemasukanpengeluaran as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->bulan }}</td>
                            <td>{{ $p->pemasukan }}</td>
                            <td>{{ $p->metodepembayaran }}</td>
                            <td>{{ $p->pengeluaran }}</td>
                            <td>{{ $p->gambar }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->totalsaldo }}</td>
                            <td>{{ $p->status }}</td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.pemasukanpengeluaran.edit1',$p->id)}}" class="btn btn-info">Edit</a>
                                <a title="Delete" href="{{route('admin.rt.pemasukanpengeluaran.hapus',$p->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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
            Tabel gambar QRIS
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{route('admin.rt.qris.tambah') }}" class="btn btn-primary">Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="qris-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Gambar QRIS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($qris as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->nama }}</td>
                            <td><img width="100" height="100"src="{{asset('upload/qris/'.$p->gambar)}}"></td>
                            <td>

                                <a title="Delete" href="{{route('admin.rt.qris.hapus',$p->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
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