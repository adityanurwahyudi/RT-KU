@extends('template.backend.main')

@section('content')
<style>
    .hide {
        display: none !important
    }
    </style>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Pembayaran Kas Warga</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Pembayaran Kas Warga</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Pembayaran Kas Warga
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.konfirmasipembayaran.proses2') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama </label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <label for="Visi" class="form-label" >Bulan</label>
                                <select id="bulan" class="form-control input-group control-group after-add-more" name="bulan[]">
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
                                            <button class="btn btn-success add-more" type="button"><i
                                                    class="glyphicon glyphicon-plus"></i> Add</button>
                                        </div>
                                
                                <br>
                                <label>Metode Pembayaran</label>
                                <select id="metodepembayaran" class="form-control" name="metodepembayaran">
                                    <option value="tunai">Tunai</option>
                                    <option value="non-tunai">Non-Tunai</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="status" name="status" value="diterima" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Bukti Pembayaran</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                                </div>
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