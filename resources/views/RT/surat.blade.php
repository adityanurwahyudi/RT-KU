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
        .alertFile{
            font-size:13px;
            color:red;
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
            Tanda Tangan Dan Stempel
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($ttd) == 0)
                <button type="button" class="btn btn-sm btn-success" onclick="TambahTandaTangan()"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                <br><br>
                @endif
                <table class="table table-striped table-bordered table-hover table-condensed" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Tanda Tangan</th>
                            <th>Stempel</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ttd as $val)
                        <tr>
                            <td>{{ $val->rt }}</td>
                            <td>{{ $val->rw }}</td>
                            <td><a href="{{ asset('/upload/tanda_tangan/'.$val->tanda_tangan.'') }}" target="_blank" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i>&nbsp;Lihat</a></td>
                            <td><a href="{{ asset('/upload/stempel/'.$val->stempel.'') }}" target="_blank" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i>&nbsp;Lihat</a></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" onclick="EditTandaTangan('{{ $val->id }}')"><i class="fa fa-edit"></i></button>
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
                                <button type="button" title="Edit" onclick="editDomisili('{{ $val->id }}','{{ $val->status }}','{{ $val->catatan }}')" class="btn btn-info">Edit</button>
                                <button type="button" title="Delete" class="btn btn-danger" onclick="hapusDomisili('{{ $val->id }}')">Delete</button>
                                @elseif($val->status==2)
                                <button type="button" title="Delete" class="btn btn-danger" onclick="hapusDomisili('{{ $val->id }}')">Delete</button>
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
{{-- Modal Tambah TTD --}}
<div class="modal fade" id="modal-tambah-ttd" role="dialog" aria-labelledby="labelTandaTangan"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelTandaTangan">Tambah Tandan Tangan & Stempel</h5>
                </button>
            </div>
            <form id="form-ttd" method="POST" action="{{ route('admin.rt.tambah_ttd') }}" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanda Tangan</label>
                        <input type="file" class="form-control" id="tanda_tangan" name="tanda_tangan" accept=".png" required>
                        <span class="alertFile">*Format File Harus .png</span>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stempel</label>
                        <input type="file" class="form-control" id="stempel" name="stempel" accept=".png" required>
                        <span class="alertFile">*Format File Harus .png</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('modal-tambah-ttd')">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Edit TTD --}}
<div class="modal fade" id="modal-edit-ttd" role="dialog" aria-labelledby="labelTandaTangan"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelTandaTangan">Tambah Tandan Tangan & Stempel</h5>
                </button>
            </div>
            <form id="form-ttd" method="POST" action="{{ route('admin.rt.update_ttd') }}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tanda Tangan</label>
                        <input type="file" class="form-control" id="e_tanda_tangan" name="tanda_tangan" accept=".png">
                        <span class="alertFile">*Format File Harus .png</span>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stempel</label>
                        <input type="file" class="form-control" id="e_stempel" name="stempel" accept=".png">
                        <span class="alertFile">*Format File Harus .png</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('modal-edit-ttd')">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    });

    function TambahTandaTangan(){
        $('#modal-tambah-ttd').modal('show');
    }

    function EditTandaTangan(id)
    {
        $('#id').val(id);

        $('#modal-edit-ttd').modal('show');
    }

    function editDomisili(id, status, catatan){
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
                      '<select class="form-control" id="status" onchange="HideCatatanDomisili()" name="status" value="'+status+'">'+
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
    
    function HideCatatanDomisili(){
        if($('#status').val() == 2){
            $('.catatan').show();
        }else{
            $('.catatan').hide();
        }
    }

    function hapusDomisili(id)
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

    function catatan(catatan)
    {
        Swal.fire(
        catatan,
        '',
        'info'
        )
    }

    function closeModal(modal){
        $('#'+modal+'').modal('toggle');
    }
</script>
@endsection