@extends('template.backend.main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Jadwal Ronda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active"> Edit Jadwal Ronda</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit Jadwal Ronda
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('admin.rt.jadwalronda.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ $jadwal->id }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Warga</label>
                        <div class="mb-3 input-group control-group after-add-more">
                            <input type="text" class="form-control" value="{{ getUser($jadwal->id_users)->name }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}"
                            required>
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
    });
</script>
@endsection