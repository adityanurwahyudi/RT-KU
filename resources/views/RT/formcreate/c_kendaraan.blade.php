@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Kendaraan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Kendaraan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Kendaraan
                        </div>

                        <div class="card-body">
                            <form action="/kendaraan/save" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <label>Nama Pemilik</label>
                                <select id="nama" class="form-control" name="nama">
                                    <option value="motor">Motor</option>
                                    <option value="mobil">Mobil</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="kendaraan" class="form-label">Input Kendaraan</label>
                                    <div class="input-group control-group after-add-more">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add-more" type="button"><i
                                                    class="glyphicon glyphicon-plus"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="hidden" id="status" name="status" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">

                                    <input type="text" id="nopol" name="nopol[]" class="form-control"
                                        placeholder="Nomer Plat Kendaraan">
                                    <div class="col-md-12"></div>
                                    <br>
                                    <input type="text" id="jeniskendaraan" name="jeniskendaraan[]" class="form-control"
                                        placeholder="Jenis Kendaraan">
                                    <div class="col-md-12"></div>
                                    <br>
                                    <center>
                                        <div class="tengah input-group-btn">
                                            <button class="btn btn-danger remove" type="button"><i
                                                    class="glyphicon glyphicon-remove"></i>Remove</button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

@section('script')
<script type="text/javascript">
</script>
@endsection 