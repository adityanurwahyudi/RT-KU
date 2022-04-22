@extends('template.backend.main')

@section('content')  <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('dropzone/dist/min/dropzone.min.css')}}">

    <!-- JS -->
    <script src="{{asset('dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>

<style>
    .hide {
        display: none !important
    }
    </style>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Foto</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Foto</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Foto
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.rt.foto.proses') }}" class='dropzone'  method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                <div class="input-group control-group after-add-more">
                                    <input type="file" class="form-control" id="gambar" name="gambar" required>
                                                                  </div>
                            </div>
                                
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                            <div class="copy hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" id="gambar" name="gambar[]" class="form-control"
                                        placeholder="Gambar">
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
<script type="text/javascript">
</script>
<script>
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