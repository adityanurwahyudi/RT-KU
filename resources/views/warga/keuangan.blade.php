@extends('template.frontend.main')

@section('css')

@endsection

@section('content')
<style>
    .hide {
        display: none !important
    }
    </style>
<!-- Modal Konfirmasi Pembayaran -->
<div id="id02" class="modal">
                    <form class="modal-content animate" action="/action_page.php" method="post">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id02').style.display='none'" class="close"
                                title="Close Modal">&times;</span>
                            <img src="{{asset('/sbwarga/images/kas.jpg')}}" alt="Avatar" class="avatar">
                        </div>
                        <div class="container">
                            <label for="nama"><b>Nama Lengkap</b></label>
                            <input id="nama" type="text" placeholder="Nama Lengkap" name="nama" required>

                            <label for="pemasukan"><b>Jumlah</b></label>
                            <input id="pemasukan" type="text" placeholder="Jumlah Pembayaran" name="pemasukan" required>
                            
                            <input id="metodepembayaran" type="hidden"  name="metodepembayaran" value="Non-Tunai" required>
                            <label for="bulan" class="form-label">Bulan yang dibayar</label><br>
                            <div class="input-group control-group after-add-more">
                            <div class="input-group-btn">
                              <button class="btn btn-success add-more" type="button">
                                  <i class="glyphicon glyphicon-plus"></i>Tambah Bulan</button>
                               </div>
                            <br>
                            </div>
                            <label>Upload Bukti Pembayaran</label>
                            <input id="bukti" name="bukti" type="file" class="form-control" placeholder="Upload Bukti">
                            
                            <input id="status" type="hidden"  name="status" value="Baru" required>

                            <button type="submit">Kirim</button>
                        </div>
                    </form>
                    <div class="copy hide">
                        <label>Bulan yang dibayar</label>
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
                                        <button class="btn btn-danger remove"  type="button"><i
                                                class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                </div>

            <section class="page-title bg-keuangan2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-white">Laporan Keuangan</span>
                                <h1 class="text-capitalize mb-4 text-lg">Keuangan Warga</h1>

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
                                <span class="h6 text-color">Keuangan</span>
                                <h2 class="mt-3 content-title ">Tabel Laporan Keuangan</h2>
                            </div>
                        </div>
                    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Keuangan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="keuangan-table">
                <thead>
                                <tr>
                                <th>Tanggal</th>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Pemasukan</th>
                                <th>Pengeluaran</th>
                                <th>Total Saldo</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                     @foreach($keuangan as $p)
                        <tr>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->pemasukan }}</td>
                            <td>{{ $p->pengeluaran }}</td>
                            <td>{{ $p->totalsaldo }}</td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            </div>
        
        </section>
            <script src="{{asset('/sbadmin/js/scripts.js')}}"></script>
            </script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="{{asset('/sbadmin/js/datatables-simple-demo.js')}}"></script>
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

            <script>
            var modal = document.getElementById('id01');
            var modal = document.getElementById('id02');
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = " none";
                }
            }
            </script>
        @endsection

        @section('script')
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
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