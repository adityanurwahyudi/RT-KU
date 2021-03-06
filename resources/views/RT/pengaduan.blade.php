@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Keamanan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan Pengaduan / Pelaporan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Laporan Pengaduan / Pelaporan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="{{ route('admin.rt.pengaduan.cetak_pengaduan')}}" target="_blank" class="btn btn-warning"> <i class="fa fa-file"></i> Lihat PDF</a>
		        <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori Pengaduan</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($pengaduan as $p)
                     
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->kategori }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>
                                
                                <?php
                                $bkt =  explode(".",$p->bukti);
                                ?>
                                @if($bkt[1]== 'mp4')
                                    <a href="{{url('upload/pengaduan/'.$p->bukti.'')}}" class="btn btn-primary"> <i class="fa fa-video"></i></a>
                                @else
                                    <a href="{{url('upload/pengaduan/'.$p->bukti.'')}}" class="btn btn-primary"> <i class="fa fa-image"></i>
                                @endif
                            </td>
                            <td>{{ $p->deskripsi }}</td>
                            <td>
                                <a title="Delete" href="{{route('admin.rt.pengaduan.hapus',$p->id)}}" class="btn btn-danger"
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
@endsection