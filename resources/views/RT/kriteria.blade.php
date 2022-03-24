@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tabel Kriteria</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a>Dashboard</a></li>
        <li class="breadcrumb-item active">Tabel Kriteria</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Kepentingan(W) Dari Setiap Kriteria
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kepentingan-table">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Rating Kepentingan</td>
                            <td> 4 </td>
                            <td> 4 </td>
                            <td> 3 </td>
                            <td> 3 </td>
                            <td> 2 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Penghasilan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="penghasilan-table">
                    <thead>
                        <tr>
                            <th>C1</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> > 5.000.000</td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td>3.000.000 - < 5.000.000</td> <td>2</td>
                        </tr>
                        <tr>
                            <td>1.000.000 - < 3.000.000</td> <td>3</td>
                        </tr>
                        <tr>
                            <td>500.000 - 1.000.000</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>
                                < 500.000</td> <td>5
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
            Kriteria Pekerjaan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="pekerjaan-table">
                    <thead>
                        <tr>
                            <th>C2</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PNS</td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td> Pengusaha </td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Pegawai Swasta</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Serabutan</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>
                                Tidak Bekerja</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Jumlah Tanggungan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="tanggungan-table">
                    <thead>
                        <tr>
                            <th>C3</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> > 5 Orang</td>
                            <td> 4 </td>
                        </tr>
                        <tr>
                            <td> 3-4 Orang</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td> 1-2 Orang</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Tidak Punya Tanggungan</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Kendaraan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="kendaraan-table">
                    <thead>
                        <tr>
                            <th>C4</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mobil & Motor</td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td>Mobil</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Motor </td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>Tidak Punya Kendaraan</td>
                            <td>4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Kriteria Kelayakan Rumah
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="rumah-table">
                    <thead>
                        <tr>
                            <th>C5</th>
                            <th>Bobot (W)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Layak</td>
                            <td> 1 </td>
                        </tr>
                        <tr>
                            <td>Tidak Layak</td>
                            <td>2</td>
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