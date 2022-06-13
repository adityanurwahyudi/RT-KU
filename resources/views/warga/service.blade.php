@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
    <section class="page-title bg-surat">
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
                                                </p><center>                                          
                                                 <button type='button'
                                                    data-toggle="modal" data-target="#modal-domisili"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button></center>     
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="{{ asset('sbwarga/images/surat/kematian.jpg') }}" class="card-img-top"
                                                alt="Sunset Over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Surat Pengantar</h5>
                                                </center>
                                                <p class="card-text">
                                                Surat pengantar dari ketua RT merupakan salah satu jenis surat yang sering kita jumpai dalam kehidupan sehari-hari. Biasanya pembuatan surat pengantar dimaksudkan sebagai bentuk kesopanan dalam proses administrasi baik untuk kebutuhan pribadi, lembaga, atau perusahaan.
                                                </p>
                                                <center>
                                                <button type='button'
                                                    data-toggle="modal" data-target="#modal-pengantar"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                                </center>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-none d-lg-block">
                                        <div class="card h-100">
                                            <img src="{{ asset('sbwarga/images/surat/sktm.jpg') }}" class="card-img-top"
                                                alt="Sunset over the Sea" />
                                            <div class="card-body">
                                                <center>
                                                    <h5 class="card-title">Surat Keterangan Kematian</h5>
                                                </center>
                                                <p class="card-text">
                                                Surat keterangan kematian berfungsi sebagai dokumen untuk menetapkan status seseorang, apakah itu janda atau duda terutama bagi pegawai negeri sipil. Hal ini nantinya akan digunakan sebagai syarat jika ingin menikah kembali.
                                                </p>
                                                <center>
                                                <button type='button'
                                                    data-toggle="modal" data-target="#modal-kematian"
                                                    class='btn btn-primary center-block'>
                                                    Ajukan Surat
                                                </button>
                                                </center>
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
                                <th>Tanggal Lahir</th>
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
                                        <button type="button" class="btn btn-danger btn-round-full " onclick="kirimDomisili('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-primary btn-round-full " onclick="editDomisili(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @elseif($val->status==1)
                                        <button type="button" class="btn btn-primary" onclick="viewDomisili(this)" data-item="{{json_encode($val)}}">VIEW</button>
                                    @elseif($val->status==2)
                                        <button type="button" class="btn btn-danger" onclick="kirimDomisili('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-danger" onclick="editDomisili(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @else
                                        <a href="{{route('warga.cetak_domisili', $val->id)}}" target="_blank" class="btn btn-warning btn-round-full"><i class="fa fa-file" aria-hidden="true"></i> CETAK</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @foreach($pengantar as $val)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $val->nama }}</td>
                                <td>{{ $val->tgl_lahir }}</td>
                                <td>Pengantar</td>
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
                                        <button type="button" class="btn btn-danger btn-round-full " onclick="kirimPengantar('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-primary btn-round-full " onclick="editPengantar(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @elseif($val->status==1)
                                        <button type="button" class="btn btn-primary" onclick="viewPengantar(this)" data-item="{{json_encode($val)}}">VIEW</button>
                                    @elseif($val->status==2)
                                        <button type="button" class="btn btn-danger" onclick="kirimPengantar('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-danger" onclick="editPengantar(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @else
                                        <a href="{{route('warga.cetak_pengantar', $val->id)}}" target="_blank" class="btn btn-warning btn-round-full"><i class="fa fa-file" aria-hidden="true"></i> CETAK</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @foreach($kematian as $val)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $val->nama }}</td>
                                <td>{{ $val->tgl_lahir }}</td>
                                <td>Kematian</td>
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
                                        <button type="button" class="btn btn-danger btn-round-full " onclick="kirimKematian('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-primary btn-round-full " onclick="editKematian(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @elseif($val->status==1)
                                        <button type="button" class="btn btn-primary" onclick="viewKematian(this)" data-item="{{json_encode($val)}}">VIEW</button>
                                    @elseif($val->status==2)
                                        <button type="button" class="btn btn-danger" onclick="kirimKematian('{{$val->id}}')"><i class="fa fa-file" aria-hidden="true"></i> Kirim</button>
                                        <button type="button" class="btn btn-danger" onclick="editKematian(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                                    @else
                                        <a href="{{route('warga.cetak_kematian', $val->id)}}" target="_blank" class="btn btn-warning btn-round-full"><i class="fa fa-file" aria-hidden="true"></i> CETAK</a>
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
                            <label color="#000000" for="nama">Nama Lengkap</label>
                            <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="pekerjaan">Pekerjaan</label>
                            <input type="text" maxlength="100" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukan Pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="agama">Agama</label>
                            <select  class="form-control" id="agama" name="agama" for="agama">
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="jenis_kelamin">Jenis Kelamin</label>
                            <p><input type='radio' name='jenis_kelamin' value='Laki-Laki' />Laki-laki</p>
                            <p><input type='radio' name='jenis_kelamin' value='Perempuan' />Perempuan</p>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label color="#000000" for="alamat">Alamat</label>
                            <input type="text" maxlength="255" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required>
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
    <!-- Modal Pengantar -->
    <div class="modal fade" id="modal-pengantar" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Pengantar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahSuratPengantar" action="{{ route('warga.tambah_pengantar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" maxlength="100" class="form-control" id="nama_pengantar" name="nama_pengantar" placeholder="Masukan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" maxlength="100" class="form-control" id="pekerjaan_pengantar" name="pekerjaan_pengantar" placeholder="Masukan Pekerjaan" required>
                        </div>
                        <div class="form-group"> 
                        <label color="#000000" for="agama">Agama</label>
                            <select  class="form-control" id="agama_pengantar" name="agama_pengantar" for="agama">
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" class="form-control" id="tempat_lahir_pengantar" name="tempat_lahir_pengantar" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir_pengantar" name="tgl_lahir_pengantar" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <p><input type='radio' name='jenis_kelamin_pengantar' value='Laki-Laki' />Laki-laki</p>
                            <p><input type='radio' name='jenis_kelamin_pengantar' value='Perempuan' />Perempuan</p>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat_pengantar" name="alamat_pengantar" placeholder="Masukan Alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input type="text" class="form-control" id="keperluan_pengantar" name="keperluan_pengantar" placeholder="Dipergunakan untukk" required>
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
     <!-- Modal Kematian -->
     <div class="modal fade" id="modal-kematian" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Keterangan Kematian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahSurat" action="{{ route('warga.tambah_kematian') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" maxlength="100" minlength="3" class="form-control" id="nama_kematian" name="nama_kematian" placeholder="Masukan Nama Lengkap" required>
                        </div> 
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <p><input type='radio' name='jenis_kelamin_kematian' value='Laki-Laki' />Laki-laki</p>
                            <p><input type='radio' name='jenis_kelamin_kematian' value='Perempuan' />Perempuan</p>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" minlength="5" class="form-control" id="tempat_lahir_kematian" name="tempat_lahir_kematian" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir_kematian" name="tgl_lahir_kematian" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" maxlength="100" minlength="5" class="form-control" id="pekerjaan_kematian" name="pekerjaan_kematian" placeholder="Masukan Pekerjaan" required>
                        </div>
                        <div class="form-group">
                        <label color="#000000" for="agama">Agama</label>
                            <select  class="form-control" id="agama_kematian" name="agama_kematian" for="agama">
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" maxlength="100" minlength="15" class="form-control" id="alamat_kematian" name="alamat_kematian" placeholder="Masukan Alamat" required>
                        </div>
                        <br>
                        <p>Telah Meninggal Dunia Pada:. </p>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal_kematian" name="tanggal_kematian" placeholder="Masukan Tanggal Kematian" required>
                        </div>
                        <div class="form-group">
                            <label for="penyebab">Penyebab Kematian</label>
                            <input type="text" maxlength="100" minlength="5" class="form-control" name="penyebab_kematian" id="penyebab_kematian" placeholder="Penyebab Kematian" required>
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

    {{-- Modal Edit Domisili--}}
    <div class="modal fade" id="modal-edit-domisili" style="z-index:1500" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HeaderModalDomisili"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formEditSurat" action="{{route('warga.edit_domisili')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="modal-body">
                            <input type="hidden" name="id" id="id_domisili">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" maxlength="100" class="form-control" id="nama_e" name="nama" placeholder="Masukan Nama">
                            </div>
                            <div class="form-group">
                                <label color="#000000" for="pekerjaan">Pekerjaan</label>
                                <input type="text" maxlength="100" class="form-control" id="pekerjaan_e" name="pekerjaan" placeholder="Masukan Pekerjaan" required>
                            </div>
                            <div class="form-group">
                                <label color="#000000" for="agama">Agama</label>
                                <select  class="form-control" id="agama_e" name="agama">
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                              </select>
                            </div>
                            <div class="form-group">
                                <label color="#000000" for="jenis_kelamin">Jenis Kelamin</label>
                                <p><input type='radio' name='jenis_kelamin' id="laki_radio" value='Laki-Laki'/>Laki-laki</p>
                                <p><input type='radio' name='jenis_kelamin' id="perempuan_radio" value='Perempuan'/>Perempuan</p>
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
                                <label color="#000000" for="alamat">Alamat</label>
                                <input type="text" maxlength="255" class="form-control" id="alamat_e" name="alamat" placeholder="Masukan Alamat" required>
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
    {{-- Modal Edit Pengantar--}}
    <div class="modal fade" id="modal-edit-pengantar" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HeaderModalPengantar"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahSuratPengantar" action="{{ route('warga.edit_pengantar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_pengantar">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" maxlength="100" class="form-control" id="e_nama_pengantar" name="nama_pengantar" placeholder="Masukan Nama Lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" maxlength="100" class="form-control" id="e_pekerjaan_pengantar" name="pekerjaan_pengantar" placeholder="Masukan Pekerjaan" required>
                        </div>
                        <div class="form-group"> 
                        <label color="#000000" for="agama">Agama</label>
                            <select  class="form-control" id="e_agama_pengantar" name="agama_pengantar" for="agama">
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" class="form-control" id="e_tempat_lahir_pengantar" name="tempat_lahir_pengantar" placeholder="Masukan Tempat Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="e_tgl_lahir_pengantar" name="tgl_lahir_pengantar" placeholder="Masukan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <p><input type='radio' name='jenis_kelamin_pengantar' id="e_laki_radio" value='Laki-Laki' />Laki-laki</p>
                            <p><input type='radio' name='jenis_kelamin_pengantar' id="e_perempuan_radio" value='Perempuan' />Perempuan</p>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="e_alamat_pengantar" name="alamat_pengantar" placeholder="Masukan Alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input type="text" class="form-control" id="e_keperluan_pengantar" name="keperluan_pengantar" placeholder="Dipergunakan untukk" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="BtnSimpanPengantar">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Edit Kematian--}}
    <div class="modal fade" id="modal-edit-kematian" role="dialog" style="z-index:1500" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="HeaderModalKematian"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambahSurat" action="{{ route('warga.edit_kematian') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_kematian">
                        <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" maxlength="100" minlength="3" class="form-control" id="e_nama_kematian" name="nama_kematian" placeholder="Masukan Nama Lengkap" required>
                            </div> 
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <p><input type='radio' name='jenis_kelamin_kematian' id="e_laki_radio_kematian" value='Laki-Laki' />Laki-laki</p>
                                <p><input type='radio' name='jenis_kelamin_kematian' id="e_perempuan_radio_kematian" value='Perempuan' />Perempuan</p>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" maxlength="255" minlength="5" class="form-control" id="e_tempat_lahir_kematian" name="tempat_lahir_kematian" placeholder="Masukan Tempat Lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="e_tgl_lahir_kematian" name="tgl_lahir_kematian" placeholder="Masukan Tanggal Lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" maxlength="100" minlength="5" class="form-control" id="e_pekerjaan_kematian" name="pekerjaan_kematian" placeholder="Masukan Pekerjaan" required>
                            </div>
                            <div class="form-group">
                            <label color="#000000" for="agama">Agama</label>
                                <select  class="form-control" id="e_agama_kematian" name="agama_kematian" for="agama">
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" maxlength="100" minlength="15" class="form-control" id="e_alamat_kematian" name="alamat_kematian" placeholder="Masukan Alamat" required>
                            </div>
                            <br>
                            <p>Telah Meninggal Dunia Pada:. </p>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="e_tanggal_kematian" name="tanggal_kematian" placeholder="Masukan Tanggal Kematian" required>
                            </div>
                            <div class="form-group">
                                <label for="penyebab">Penyebab Kematian</label>
                                <input type="text" maxlength="100" minlength="5" class="form-control" name="penyebab_kematian" id="e_penyebab_kematian" placeholder="Penyebab Kematian" required>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="BtnSimpanKematian">Simpan</button>
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
        flatpickr("#tgl_lahir_pengantar", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tgl_lahir_kematian", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tanggal_kematian", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });

        function kirimDomisili(id){
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

        function editDomisili(obj){
            var item = $(obj).data('item');
            $('#HeaderModalDomisili').text('Edit Surat Domisili');
            
            $('#id_domisili').val(item.id);
            $('#nama_e').val(item.nama);
            $('#pekerjaan_e').val(item.pekerjaan);
            $('#tempat_lahir_e').val(item.tempat_lahir);
            flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
            $('#agama_e').val(item.agama);
            $('#alamat_e').val(item.alamat);
            if(item.jenis_kelamin == 'Perempuan'){
                $("#perempuan_radio").attr('checked', 'checked');
            }else{
                $("#laki_radio").attr('checked', 'checked');
            }
            
            $('#modal-edit-domisili').modal('show');
        }

        function viewDomisili(obj){
            var item = $(obj).data('item');
            $('#HeaderModalDomisili').text('View Surat Domisili');
            $('#id').val(item.id);
            $('#nama_e').val(item.nama);
            $('#pekerjaan_e').val(item.pekerjaan);
            $('#tempat_lahir_e').val(item.tempat_lahir);
            flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
            $('#agama_e').val(item.agama);
            $('#alamat_e').val(item.alamat);
            $('.form-control').attr('readonly', true);
            $('#BtnSimpan').hide();
            if(item.jenis_kelamin == 'Perempuan'){
                $("#perempuan_radio").attr('checked', 'checked');
            }else{
                $("#laki_radio").attr('checked', 'checked');
            }
            
            $('#modal-edit-domisili').modal('show');
        }

        function kirimPengantar(id){
            Swal.fire({
                icon: 'question',
                title: 'Ingin Mengirim Data?',
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonText: "Kirim",
            }).then(function(result) {
                if(result.value){
                    window.location.href = "{{ URL::to('warga/service/pengantar/kirim/')}}"+'/'+id;
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

        function editPengantar(obj){
            var item = $(obj).data('item');
            $('#HeaderModalPengantar').text('Edit Surat Pengantar');
            
            $('#id_pengantar').val(item.id);
            $('#e_nama_pengantar').val(item.nama);
            $('#e_pekerjaan_pengantar').val(item.pekerjaan);
            $('#e_agama_pengantar').val(item.agama);
            $('#e_tempat_lahir_pengantar').val(item.tempat_lahir);
            flatpickr("#e_tgl_lahir_pengantar").setDate(item.tgl_lahir);
            $('#e_alamat_pengantar').val(item.alamat);
            if(item.jenis_kelamin == 'Perempuan'){
                $("#e_perempuan_radio").attr('checked', 'checked');
            }else{
                $("#e_laki_radio").attr('checked', 'checked');
            }
            $('#e_keperluan_pengantar').val(item.keperluan);
            
            $('#modal-edit-pengantar').modal('show');
        }

        function viewPengantar(obj){
            var item = $(obj).data('item');
            $('#HeaderModalPengantar').text('Edit Surat Pengantar');
            
            $('#id_pengantar').val(item.id);
            $('#e_nama_pengantar').val(item.nama);
            $('#e_pekerjaan_pengantar').val(item.pekerjaan);
            $('#e_agama_pengantar').val(item.agama);
            $('#e_tempat_lahir_pengantar').val(item.tempat_lahir);
            flatpickr("#e_tgl_lahir_pengantar").setDate(item.tgl_lahir);
            $('#e_alamat_pengantar').val(item.alamat);
            if(item.jenis_kelamin == 'Perempuan'){
                $("#e_perempuan_radio").attr('checked', 'checked');
            }else{
                $("#e_laki_radio").attr('checked', 'checked');
            }
            $('#e_keperluan_pengantar').val(item.keperluan);
            $('.form-control').attr('readonly', true);
            $('#BtnSimpanPengantar').hide();
            
            $('#modal-edit-pengantar').modal('show');
        }

        function kirimKematian(id){
            Swal.fire({
                icon: 'question',
                title: 'Ingin Mengirim Data?',
                showCancelButton: true,
                cancelButtonText: "Batal",
                confirmButtonText: "Kirim",
            }).then(function(result) {
                if(result.value){
                    window.location.href = "{{ URL::to('warga/service/kematian/kirim/')}}"+'/'+id;
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

        function editKematian(obj){
            var item = $(obj).data('item');
            $('#HeaderModalKematian').text('Edit Surat Kematian');
            
            $('#id_kematian').val(item.id);
            $('#e_nama_kematian').val(item.nama);
            $('#e_tempat_lahir_kematian').val(item.tempat_lahir);
            flatpickr("#e_tgl_lahir_kematian").setDate(item.tgl_lahir);
            $('#e_pekerjaan_kematian').val(item.pekerjaan);
            $('#e_agama_kematian').val(item.agama);
            $('#e_alamat_kematian').val(item.alamat);
            flatpickr("#e_tanggal_kematian").setDate(item.tgl_kematian);
            $('#e_penyebab_kematian').val(item.penyebab_kematian);
            if(item.jenis_kelamin == 'Perempuan'){
                $("#e_perempuan_radio_kematian").attr('checked', 'checked');
            }else{
                $("#e_laki_radio_kematian").attr('checked', 'checked');
            }
            
            $('#modal-edit-kematian').modal('show');
        }

        function viewKematian(obj){
            var item = $(obj).data('item');
            $('#HeaderModalKematian').text('View Surat Kematian');

            $('#id_kematian').val(item.id);
            $('#e_nama_kematian').val(item.nama);
            $('#e_tempat_lahir_kematian').val(item.tempat_lahir);
            flatpickr("#e_tgl_lahir_kematian").setDate(item.tgl_lahir);
            $('#e_pekerjaan_kematian').val(item.pekerjaan);
            $('#e_agama_kematian').val(item.agama);
            $('#e_alamat_kematian').val(item.alamat);
            flatpickr("#e_tanggal_kematian").setDate(item.tgl_kematian);
            $('#e_penyebab_kematian').val(item.penyebab_kematian);
            if(item.jenis_kelamin == 'Perempuan'){
                $("#e_perempuan_radio_kematian").attr('checked', 'checked');
            }else{
                $("#e_laki_radio_kematian").attr('checked', 'checked');
            }

            $('.form-control').attr('readonly', true);
            $('#BtnSimpanKematian').hide();
            
            $('#modal-edit-kematian').modal('show');
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