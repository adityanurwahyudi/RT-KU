@extends('template.backend.main')

@section('content')
<style>
    .hide {
        display: none !important
    }
    </style>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Profile RT</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Profile RT</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Profile RT
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.profile.proses') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama RT</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div> 
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                 <div class="form-group-2 mb-4">
                                    <label for="deskripsi" class="form-label">Deskripsi Singkat</label>
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
                                    placeholder="Deskripsi"></textarea>
                            </div>
                                
                                <label for="Visi" class="form-label">Visi</label><br>
                                <div class="input-group control-group after-add-more">
                                        <input type="text" name="visi[]" id="visi" class="form-control"
                                            placeholder="Visi">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add-more" type="button"><i
                                                    class="glyphicon glyphicon-plus"></i> Add</button>
                                        </div>
                                    </div>
                                    <br>
                                    
                                <label for="Misi" class="form-label">Misi</label><br>
                                <div class="input-group control-group after-add-more1">
                                        <input type="text" name="misi[]" id="misi" class="form-control"
                                            placeholder="Misi">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add-more1" type="button"><i
                                                    class="glyphicon glyphicon-plus"></i> Add</button>
                                        </div>
                                    </div>
                                <div class="mb-3">
                                    <label for="profilert" class="form-label">Foto Profile RT</label>
                                    <input type="file" class="form-control" id="profilert" name="profilert" required>
                                </div>
                                <div class="mb-3">
                                    <label for="strukturorganisasi" class="form-label">Struktur Organisasi</label>
                                    <input type="file" class="form-control" id="strukturorganisasi" name="strukturorganisasi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="telepon" class="form-label">Telepon</label>
                                    <input type="tel" class="form-control" id="telepon" name="telepon" required>
                                </div>
                                <div class="mb-3">
                                    <label for="urlmap" class="form-label">URL Lokasi Map</label>
                                    <input type="text" class="form-control" id="urlmap" name="urlmap" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="text" id="visi" name="visi[]" class="form-control"
                                        placeholder="Visi">
                                    <div class="input-group-btn">
                                        <button class="btn btn-danger remove" type="button"><i
                                                class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="copy1 hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="text" id="misi" name="misi[]" class="form-control"
                                        placeholder="Misi">
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
@include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/sbadmin/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="/sbadmin/js/datatables-simple-demo.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        var sampleHtml = $(".copy").html();
        var sampleHtml1 = $(".copy1").html();
        $(".copy").remove(); 
        $(".copy1").remove();
        $(".add-more").click(function() {
            //var sampleHtml = $(".copy").html();
            $(".after-add-more").after(sampleHtml);
        });
        $(".add-more1").click(function() {
            //var sampleHtml = $(".copy").html();
            $(".after-add-more1").after(sampleHtml1);
        });
        $("body").on("click", ".remove", function() {
            $(this).parents(".control-group").remove();
        });
    });
    </script>
@endsection 