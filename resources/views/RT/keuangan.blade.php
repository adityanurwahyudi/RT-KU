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
                <a href="{{route('admin.rt.keuangan.tambahh') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add</a>
                <a href="{{ route('admin.rt.keuangan.cetak_keuangan')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
		        <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed"
                    id="satu">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Bukti</th>
                            <th>Total Saldo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($keuangan as $p)
                        <tr>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->pemasukan }}</td>
                            <td>{{ $p->pengeluaran }}</td>
                            <td>
                                <a class="btn btn-info" img width="100" height="100"src="{{asset('upload/keuangan/'.$p->bukti)}}"><i class="fa fa-eye"></i></a>
                            </td>
                            <td>{{ $p->totalsaldo }}</td>
                            <td>

                                <a title="Edit" href="{{route('admin.rt.keuangan.edit',$p->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                <a title="Delete" href="{{route('admin.rt.keuangan.hapus',$p->id)}}" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')"><i class="fa fa-trash"></i> Delete</a>
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