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
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Rincian</th>
                            <th>Jenis Keterangan</th>
                            <th>Jumlah</th>
                            <th>Bukti</th>
                            <th>Total Saldo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($keuangan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->jenis }}</td>
                            <td>{{ number_format($p->jumlah,3,',','.') }}</td>
                            
                            <td>
                                
                                <?php
                                $bkt =  explode(".",$p->bukti);
                                ?>
                                @if($bkt[1]== 'mp4')
                                    
                                @else
                                    <a href="{{url('upload/keuangan/'.$p->bukti.'')}}" class="btn btn-primary"> <i class="fa fa-image"></i>
                                @endif
                            </td>
                            <td>{{ number_format($p->totalsaldo,3,',','.') }}</td>
                            <td>
                                <button title="Delete" class="btn btn-danger"
                                    onclick="hapus(this)" data-item="{{json_encode($p)}}"><i class="fa fa-trash"></i> Delete</button>
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
<script>
    function hapus(obj){
        var item = $(obj).data('item');

        var id = item.id;
        var tanggal = item.tanggal;
        var keterangan = item.keterangan;
        var jenis = item.jenis;
        var jumlah = item.jumlah;
        var totalsaldo = item.totalsaldo;
        var request = id+'_'+tanggal+'_'+keterangan+'_'+jenis+'_'+jumlah+'_'+totalsaldo;
        

        Swal.fire({
            icon: 'question',
            title: 'Ingin Menghapus Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/RT/keuangan/hapus')}}"+'/'+request;
            }else{
                Swal.fire({
                    type: 'error',
                    text: "Batal Hapus",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }
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