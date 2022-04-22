@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Data Pemohon</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Data Pemohon</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Data Pemohon
                        </div>

                        <div class="card-body">
                            <form action="/SPKWarga/update" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>Nama Warga</label>
                                <select id="nama" class="form-control" name="nama" value="" required>
                                    <option value="anam">anam</option>
                                    <option value="mana">mana</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="" required>
                                </div>
                                <label>Penghasilan</label>
                                <select id="penghasilan" class="form-control" name="penghasilan" value="" required>
                                    <option value="> 5.000.000"> >5.000.000</option>
                                    <option value="3.000.000 - <5.000.000">3.000.000 - < 5.000.000 </option>
                                    <option value="1.000.000 - <3.000.000"> 1.000.000 - < 3.000.000 </option>
                                    <option value="500.000 - 1.000.000">500.000 - 1.000.000 </option>
                                    <option value="<500.000">
                                        < 500.000 </option>
                                </select>
                                <br>
                                <label>Pekerjaan</label>
                                <select id="pekerjaan" class="form-control" name="pekerjaan" value="" required>
                                    <option value="pengusaha">Pengusaha</option>
                                    <option value="pns"> PNS </option>
                                    <option value=" pegawaiswasta">Pegawai Swasta</option>
                                    <option value="serabutan">Serabutan</option>
                                    <option value="tidak bekerja">Tidak Bekerja</option>
                                </select>
                                <br>
                                <label>Jumlah Tanggungan</label>
                                <select id="tanggungan" class="form-control" name="tanggungan" value="" required>
                                    <option value=">5 orang"> > 5 Orang</option>
                                    <option value="3-4 orang"> 3-4 Orang </option>
                                    <option value="1-2 orang">1-2 Orang</option>
                                    <option value="tidakpunyatanggungan">Tidak Punya Tanggungan</option>
                                </select>
                                <br>
                                <label>Kendaraan</label>
                                <select id="kendaraan" class="form-control" name="kendaraan" value="" required>
                                    <option value=">mobil&motor">Mobil dan Motor</option>
                                    <option value="mobil">Mobil</option>
                                    <option value="motor">Motor</option>
                                    <option value="tidakpunyakendaraan">Tidak Punya Kendaraan</option>
                                </select>
                                <br>
                                <label>Kondisi Rumah</label>
                                <select id="rumah" class="form-control" name="rumah" value="" required>
                                    <option value="layak">Layak</option>
                                    <option value="tidaklayak">Tidak Layak</option>
                                </select>
                                <br>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="hidden" id="status" name="status" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
@section('script')
<script type="text/javascript">
</script>
@endsection 