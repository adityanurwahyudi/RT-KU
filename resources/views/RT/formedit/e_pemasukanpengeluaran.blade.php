@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Pemasukan dan Pengeluaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Pemasukan dan Pengeluaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Pemasukan dan Pengeluaran
                        </div>

                        <div class="card-body">
                            <form action="/pemasukanpengeluaran/update" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan </label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="pemasukan" class="form-label">Pemasukan</label>
                                    <input type="tel" class="form-control" id="pemasukan" name="pemasukan" value=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                    <input type="tel" class="form-control" id="pengeluaran" name="pengeluaran" value=""
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" value="" required>
                                </div>
                                <div class="mb-3">
                                    <label for="saldoakhir" class="form-label">Saldo Akhir</label>
                                    <input type="tel" class="form-control" id="saldoakhir" name="saldoakhir" value=""
                                        required>
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