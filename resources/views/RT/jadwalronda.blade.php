@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Jadwal Ronda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal Ronda</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Jadwal Ronda
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ route('admin.rt.jadwalronda.create') }}" class="btn btn-primary">Add</a>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="filter_tanggal" id="filter_tanggal">
                        @foreach ($jadwal as $val)
                        <option value="{{ $val->tanggal }}">{{ $val->tanggal }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="button" onclick="sendEmail()" class="btn btn-primary">KIRIM</a>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="ronda-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        getData();
        $('#filter_tanggal').change(function(){
            getData();
        })
    });

    function getData(){
        var table = $('#ronda-table').DataTable();
        var tanggal = $('#filter_tanggal').val();
        $.get("{{ URL::to('/RT/jadwal-ronda/datatable') }}",{tanggal:tanggal},function(res){
            // var data = JSON.parse(res);
            $.each(res, function(i, val){
                table.row.add([
                    i+1,
                    val.name,
                    tgl_indo(val.tanggal),
                    '<a title="Edit" href="{{ url("/RT/jadwal-ronda/edit/") }}/'+val.id+'" class="btn btn-info">Edit</a>&nbsp;&nbsp;'+
                    '<button title="Delete" class="btn btn-danger" onclick="hapus('+val.id+')">Delete</button>'
                ]).draw();
            })
        });
        table.clear();
    }

    function tgl_indo(tgl){
        var mydate = new Date(tgl);
        var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"][mydate.getMonth()];
        return mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
    }

    function hapus(id){
        Swal.fire({
            icon: 'question',
            title: 'Ingin Menghapus Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/RT/jadwal-ronda/hapus')}}"+'/'+id;
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

    function sendEmail(){
        var tgl = $('#filter_tanggal').val();
        Swal.fire({
            icon: 'question',
            title: 'Ingin Mengirim Jadwal via Email?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Kirim",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/RT/jadwal-ronda/mail-send')}}"+'/'+tgl;
            }else{
                Swal.fire({
                    icon: 'error',
                    text: "Batal Kirim",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }
</script>
@endsection