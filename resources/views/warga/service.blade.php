@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<!-- Form Surat Domisili -->
<div id="id02" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close"
                                title="Close Modal">&times;</span>
                            <img src="/loginform/images/admin.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <label for="nama"><b>Nama</b></label>
                            <input id="nama" type="text" name="nama" required>

                            <label for="nik"><b>NIK</b></label>
                            <input id="nik" type="text" name="nik" required>

                            <label for="agama"><b>Agama</b></label>
                            <input id="agama" type="text" name="agama" required>

                            <label for="tempattanggallahir"><b>Tempat/Tanggal Lahir</b></label>
                            <input id="tempattanggallahir" type="text" name="tempattanggallahir" required>

                            <label>Jenis Kelamin</label>
                            <select id="jeniskelamin" class="form-control" name="jeniskelamin">
                                <option value="lakilaki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select><br>

                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input id="pekerjaan" type="text" name="pekerjaan" required>

                            <label for="alamat"><b>Alamat Domisili</b></label>
                            <input id="alamat" type="text" name="alamat" required>
                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
                <!-- Surat Keterangan Kematian -->
                <div id="id03" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id03').style.display='none'" class="close"
                                title="Close Modal">&times;</span>
                            <img src="/loginform/images/admin.png" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <label for="nama"><b>Nama</b></label>
                            <input id="nama" type="text" name="nama" required>

                            <label for="tempatlahir"><b>Tempat Lahir</b></label><br>
                            <input id="tempatlahir" type="text" name=" tempatlahir" required>

                            <label for="tanggallahir"><b>Tanggal Lahir</b></label>
                            <input id="tanggallahir" type="date" name="tanggallahir" required><br>

                            <label for="pekerjaan"><b>Pekerjaan</b></label>
                            <input id="pekerjaan" type="text" name="pekerjaan" required>

                            <label for="agama"><b>Agama</b></label>
                            <input id="agama" type="text" name="agama" required>

                            <label for="alamat"><b>Alamat</b></label>
                            <input id="alamat" type="text" name="alamat" required>

                            <label for="hari"><b>Hari</b></label>
                            <input id="hari" type="text" name="hari" required>

                            <label for="tanggalmeninggal"><b>Tanggal Meninggal</b></label><br>
                            <input id="tanggalmeninggal" type="date" name="tanggalmeninggal" required><br>
                            <br>

                            <label for="pukul"><b>Pukul</b></label>
                            <input id="pukul" type="text" name="pukul" required>
                            <br>
                            <label for="tempat"><b>Tempat</b></label>
                            <input id="tempat" type="text" name="tempat" required>

                            <label for="makam"><b>Dimakamkan Di</b></label>
                            <input id="makam" type="text" name="makam" required>

                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                </div>
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Layanan Surat Menyurat</span>
                        <h1 class="text-capitalize mb-4 text-lg">Layanan</h1>

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
                        <span class="h6 text-color">Layanan Surat Menyurat</span>
                        <h2 class="mt-3 content-title ">Pelayanan Surat Menyurat</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="container">

                    <!-- Inner -->
                    <div class="carousel-inner py-4">
                        <!-- Single item -->
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card h-100">
                                            <img src="{{ asset('sbwarga/images/surat/domisli.jpeg') }}"
                                                class="card-img-top img-responsive" alt="Waterfall" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Surat Domisili</h5>
                                                </center>
                                                <p class="card-text">
                                                    Surat domisili adalah surat keterangan yang berupa dokumen atau bukti
                                                    resmi seorang pendatang yang bertempat tinggal di daerah tertentu.
                                                    Surat domisili dapat berupa selembar kertas yang di dalamnya tercantum
                                                    data kependudukan seseorang seperti dalam KTP
                                                </p>
                                                <button type='button'
                                                    data-toggle="modal" data-target="#modal-domisili"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="{{ asset('sbwarga/images/surat/kematian.jpg') }}" class="card-img-top"
                                                alt="Sunset Over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Card title</h5>
                                                </center>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make
                                                    up the bulk
                                                    of the card's content.
                                                </p><button type='button'
                                                    onclick="document.getElementById('id03').style.display='block'"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="{{ asset('sbwarga/images/surat/sktm.jpg') }}" class="card-img-top"
                                                alt="Sunset over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Card title</h5>
                                                </center>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make
                                                    up the bulk
                                                    of the card's content.
                                                </p><button type='button'
                                                    onclick="document.getElementById('id04').style.display='block'"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Inner -->
                </div>
                <!-- Carousel wrapper -->
            </div>

        </div>
    </section>

    <!--  Section Services Start -->
    <section class="section service border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="section-title">
                        <span class="h6 text-color">Surat-Menyurat</span>
                        <h2 class="mt-3 content-title ">Tabel Status Pengajuan Surat</h2>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Pengajuan Surat
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jenis Surat</th>
                                <th>Status Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domisili as $val)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $val->nama }}</td>
                                <td>{{ $val->tgl_lahir }}</td>
                                <td>Domisili</td>
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
                                    @if($val->status==0)
                                        <button type="button" class="btn btn-danger btn-round-full float-lg-right" onclick="kirim('{{$val->id}}')">KIRIM</button>
                                        <button type="button" class="btn btn-primary btn-round-full float-lg-right" onclick="edit(this)" data-item="{{json_encode($val)}}">EDIT</button>
                                    @elseif($val->status==1)
                                        <button type="button" class="btn btn-primary" onclick="view(this)" data-item="{{json_encode($val)}}">VIEW</button>
                                    @elseif($val->status==2)
                                        <button type="button" class="btn btn-danger" onclick="kirim('{{$val->id}}')">KIRIM</button>
                                        <button type="button" class="btn btn-danger" onclick="edit(this)" data-item="{{json_encode($val)}}">EDIT</button>
                                    @else
                                        <a href="{{route('warga.cetak_domisili', $val->id)}}" target="_blank" class="btn btn-warning">CETAK</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Domisili -->
    <div class="modal fade" id="modal-domisili" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Domisili</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahSurat" action="{{ route('warga.tambah_domisili') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" maxlength="20" class="form-control" name="agama" id="agama" placeholder="Masukan Agama" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit-domisili" style="z-index:1500" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HeaderModal"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditSurat" action="{{route('warga.edit_domisili')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" maxlength="100" class="form-control" id="nama_e" name="nama" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" maxlength="255" class="form-control" id="tempat_lahir_e" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tgl_lahir_e" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input type="text" maxlength="20" class="form-control" name="agama" id="agama_e" placeholder="Masukan Agama">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="BtnSimpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){

        })

        flatpickr("#tgl_lahir", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tgl_lahir_e", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });

        function kirim(id){
            Swal.fire({
                icon: 'question',
                title: 'Ingin Mengirim Data?',
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonText: "Kirim",
            }).then(function(result) {
                if(result.value){
                    window.location.href = "{{ URL::to('warga/service/domisili/kirim/')}}"+'/'+id;
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

        function edit(obj){
            var item = $(obj).data('item');
            $('#HeaderModal').text('Edit Surat Domisili');
            
            $('#id').val(item.id);
            $('#nama_e').val(item.nama);
            $('#tempat_lahir_e').val(item.tempat_lahir);
            flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
            $('#agama_e').val(item.agama);
            
            $('#modal-edit-domisili').modal('show');
        }

        function view(obj){
            var item = $(obj).data('item');
            $('#HeaderModal').text('View Surat Domisili');
            $('#id').val(item.id);
            $('#nama_e').val(item.nama);
            $('#tempat_lahir_e').val(item.tempat_lahir);
            flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
            $('#agama_e').val(item.agama);
            $('.form-control').attr('readonly', true);
            $('#BtnSimpan').hide();
            
            $('#modal-edit-domisili').modal('show');
        }

        function catatan(catatan){
            Swal.fire(
            catatan,
            '',
            'info'
            )
        }
    </script>


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