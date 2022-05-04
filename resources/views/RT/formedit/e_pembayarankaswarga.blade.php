@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Pembayaran Kas Warga</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Pembayaran Kas Warga</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Pembayaran Kas Warga
                        </div>

                        <div class="card-body">
                            <form action="/pembayarankaswarga/update" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama </label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="" required>
                                </div>
                                <label>Bulan</label>
                                <select id="bulan" class="form-control" name="bulan" value="" required>
                                    <option value="january">Januari</option>
                                    <option value="februari">Februari</option>
                                    <option value="maret">Maret</option>
                                    <option value="april">April</option>
                                    <option value="mei">Mei</option>
                                    <option value="juni">Juni</option>
                                    <option value="juli">Juli</option>
                                    <option value="agustus">Agustus</option>
                                    <option value="september">September</option>
                                    <option value="oktober">Oktober</option>
                                    <option value="november">November</option>
                                    <option value="desember">Desember</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="tel" class="form-control" id="jumlah" name="jumlah" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti Pembayaran</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" value="" required>
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