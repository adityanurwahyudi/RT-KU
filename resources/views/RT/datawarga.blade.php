@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Data Kependudukan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Data Kependudukan</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kependudukan Warga
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="/datawarga/tambah" class="btn btn-primary">Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="datawarga-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NO KK</th>
                            <th>Status Pernikahan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Tanggal Lahir</th>
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
            Data Warga Berdasarkan Agama
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="agama-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Islam</th>
                            <th>Kristen Protestan</th>
                            <th>Katholik</th>
                            <th>Hindu</th>
                            <th>Budha</th>
                            <th>Kong Hu Cu</th>
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
                            <td></td>
                            <td></td>
                            <td>
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
            Data Warga Berdasarkan Usia
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="usia-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>0-10</th>
                            <th>10-25</th>
                            <th>25-40</th>
                            <th>40-60</th>
                            <th>60></th>
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
                            <td> </td>
                            <td>
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
            Data Warga Tidak Mampu
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <a href="/tidakmampu/tambah" class="btn btn-primary">Add</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="tidakmampu-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Penghasilan</th>
                            <th>Pekerjaan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Kendaraan</th>
                            <th>Kondisi Rumah</th>
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
            Data Warga Berdasarkan Jenis Kelamin
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table class="table table-striped table-bordered table-hover table-condensed" id="jeniskelamin-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Laki-Laki</th>
                            <th>Perempuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a title="Delete" href=" " class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">Delete</a>
                            </td>
                        </tr>
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