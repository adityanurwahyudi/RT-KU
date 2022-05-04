@extends('template.backend.main')

@section('css')
    <style>
        .select2-container{
            width:94%!important;
        }
        .select2-container .select2-selection--single {
            height:37px!important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 33px!important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create Jadwal Ronda</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active"> Create Jadwal Ronda</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Create Jadwal Ronda
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('admin.rt.jadwalronda.save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Warga</label>
                            <div class="mb-3 input-group control-group">
                                <select class="form-control select2" name="nama" id="nama">
                                    <option value="" selected>-- Pilih Nama --</option>
                                    @foreach($warga as $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-btn"><br>
                                    <button onclick="addMultipleNama()" class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                                </div>
                            </div>
                            <div id="multipleNama">

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <br>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-info" value="Create" />
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">
 $(document).ready(function() {
     $('.select2').select2();
 });

    function addMultipleNama(){
        var html = '';
        var value = $('#nama option').filter(':selected').val();
        var text = $('#nama option').filter(':selected').text();
        console.log(text);
        if(value != ""){
            html += '<div class="control-group input-group" style="margin-top:10px">';
            html += '<input type="hidden" name="id_users[]" value="'+value+'">';
            html += '<input type="text" class="form-control" name="name[]" value="'+text+'" readonly>';
            html += '<div class="input-group-btn">';
            html += '<button class="btn btn-danger" onclick="removeMultipleNama(this)" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#multipleNama').append(html);
            $('#nama').val("");
        }else{
            alert('Silahkan Pilih Nama');
        }

    }

    function removeMultipleNama(obj){
        $(obj).parent().parent().remove();
    }
</script>
@endsection