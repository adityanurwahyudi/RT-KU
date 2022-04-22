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
        .badge-danger {
            color: #fff;
            background-color: #b61408;
        }
        .badge-info {
            color: #fff;
            background-color: #1567ff;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Permohonan Surat</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Permohonan Surat</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Pengajuan Surat
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>

                                <a title="Edit" href="" class="btn btn-info">Edit</a>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Surat Keterangan Tidak Mampu
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>

                                <a title="Edit" href="" class="btn btn-info">Edit</a>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Surat Kematian
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>

                                <a title="Edit" href="" class="btn btn-info">Edit</a>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Surat Domisili
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="surat-domisili">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Created By</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Agama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($domisili as $val)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ getUser($val->id_users)->name }}</td>
                            <td>{{ $val->nama }}</td>
                            <td>{{ $val->tempat_lahir }}</td>
                            <td>{{ $val->tgl_lahir }}</td>
                            <td>{{ $val->agama }}</td>
                            <td>
                                @if($val->status==0)
                                <span class="badge badge-info">Draft</span>
                                @elseif($val->status==1)
                                <span class="badge badge-warning">On Process</span>
                                @elseif($val->status==2)
                                <span class="badge badge-danger" style="cursor: pointer;" onclick="catatan('{{$val->catatan}}')">Revisi</span>
                                @else
                                <span class="badge badge-success">Approve</span>
                                @endif
                            </td>
                            <td>
                                @if($val->status==1)
                                <button type="button" title="Edit" onclick="edit('{{ $val->id }}','{{ $val->status }}','{{ $val->catatan }}')" class="btn btn-info">Edit</button>
                                <button type="button" title="Delete" class="btn btn-danger" onclick="hapus('{{ $val->id }}')">Delete</button>
                                @elseif($val->status==2)
                                <button type="button" title="Delete" class="btn btn-danger" onclick="hapus('{{ $val->id }}')">Delete</button>
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
    $(document).ready(function(){
    });

    function edit(id, status, catatan){
        var verif='';var tolak='';var approve='';
        if(status == 1){
            verif = 'selected';
        }else if(status == 2){
            tolak = 'selected';
        }else{
            approve = 'selected';
        }
        var html = '<form id="verifikasiDomisili" method="post" action="{{ route("admin.rt.verifikasi_domisili") }}" width="100%">'+
                    '@csrf'+
                      '<input type="hidden" name="id" value="'+id+'">'+
                      '<label>Status</label>'+
                      '<select class="form-control" id="status" onchange="HideCatatan()" name="status" value="'+status+'">'+
                            '<option value="1" '+verif+'>Verifikasi</option>'+
                            '<option value="2" '+tolak+'>Ditolak</option>'+
                            '<option value="3" '+approve+'>Approve</option>'+
                        '</select>'+
                        '<br>'+
                        '<label class="catatan" style="display:none;">Catatan</label>'+
                        '<textarea class="form-control catatan" name="catatan" value="'+catatan+'" style="display:none;">'+catatan+'</textarea>'+
                  '</form>';
        Swal.fire({
            position: 'mid-end',
            title: 'Edit Surat Domisili',
            html: html,
            showCancelButton: true,
            cancelButtonText:'Batal',
          }).then(function(result) {
                if (result.value) {
                    document.getElementById("verifikasiDomisili").submit();
                } else if (result.value === 0) {
                    Swal.fire({
                        icon: 'error',
                        text: "Batal Simpan"
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: "Batal Simpan"
                    });
                }
          })
    }
    
    function HideCatatan(){
        if($('#status').val() == 2){
            $('.catatan').show();
        }else{
            $('.catatan').hide();
        }
    }

    function hapus(id)
    {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Akun Tersebut",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
            }).then((result) => {
                if(result.value){
                    window.location.href = "{{ URL::to('RT/surat/domisili/delete')}}"+'/'+id;
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: "Batal Hapus",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
        })
    }

    function catatan(catatan){
            Swal.fire(
            catatan,
            '',
            'info'
            )
        }
</script>
@endsection