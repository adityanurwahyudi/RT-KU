@extends('template.backend.main')

@section('content')
<style>
    .hide {
        display: none !important
    }
    </style>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Pemasukan dan Pengeluaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Pemasukan dan Pengeluaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Pemasukan dan Pengeluaran
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.pemasukanpengeluaran.proses1') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label for="nama">Nama</label>
                                <select id="nama" class="form-control" name="nama">
                                <option value="Aditya">Aditya</option>
                                <option value="Brayent">Brayent</option>
                                </select>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <label for="bulan" class="form-label">Bulan yang dibayar</label><br>
                                <div class="input-group control-group after-add-more">
                                
                                <select id="bulan" class="form-control" name="bulan[]">
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
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add-more" type="button"><i
                                                    class="glyphicon glyphicon-plus"></i> Add</button>
                                        </div>
                                    </div>
                                <div class="mb-3">
                                    <label for="pemasukan" class="form-label">Pemasukan</label>
                                    <input type="tel" class="form-control" id="pemasukan" name="pemasukan" required>
                                </div>
                                <input type="hidden" id="metodepembayaran" name="metodepembayaran" value="Tunai">
                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                    <input type="tel" class="form-control" id="pengeluaran" name="pengeluaran" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="saldoakhir" class="form-label">Saldo Akhir</label>
                                    <input type="tel" class="form-control" id="saldoakhir" name="saldoakhir" required>
                                </div>
                                <input type="hidden" id="status" name="status" value="diterima">
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                            
                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">

                                <select id="bulan" class="form-control" name="bulan[]">
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
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger remove" type="button"><i
                                                class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
        @endsection

@section('script')
<script type="text/javascript">
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var sampleHtml = $(".copy").html();
        $(".copy").remove(); 
        $(".add-more").click(function() {
            //var sampleHtml = $(".copy").html();
            $(".after-add-more").after(sampleHtml);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
    </script>
@endsection 