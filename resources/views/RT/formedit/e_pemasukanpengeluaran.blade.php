@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Profile</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Berita
                        </div>

                        <div class="card-body">                            
                            @php
                            $p = $keuangan
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
                            <form action="{{ route('admin.rt.keuangan.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                
                                @foreach($keuangan as $p)
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $p->keterangan }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pemasukan" class="form-label">Pemasukan</label>
                                    <input type="text" class="form-control" id="pemasukan" name="pemasukan" placeholder="jika kosong isi 0" value="{{ $p->pemasukan }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                    <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" placeholder="jika kosong isi 0" value="{{ $p->pengeluaran }}"  required>
                                </div>

                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label><br>
                                    <img id="bukti" name="bukti" width="250" height="250" src="{{asset('upload/keuangan/'.$p->bukti)}}" readonly>
                                    
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