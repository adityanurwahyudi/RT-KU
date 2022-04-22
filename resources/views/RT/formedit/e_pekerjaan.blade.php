@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Pekerjaan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Pekerjaan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Pekerjaan
                        </div>

                        <div class="card-body">                            
                            @php
                            $p = $pekerjaan
                            @endphp
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{ route('admin.rt.pekerjaan.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @foreach($pekerjaan as $p)
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Nama Pekerjaan </label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $p->keterangan }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bobot" class="form-label">Bobot</label>
                                    <input type="text" class="form-control" id="bobot" name="bobot" value="{{ $p->bobot }}"
                                        required>
                                </div>
                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <input type="hidden" id="status" name="status" value="" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
                
        @endsection

@section('script')
<script type="text/javascript">
</script>
@endsection 