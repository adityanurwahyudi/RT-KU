@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Laporan Keuangan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Laporan Keuangan</li>
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
                                    <label for="keterangan" class="form-label">Rincian</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $p->keterangan }}" required>
                                </div>

                                <label>Jenis Keterangan :</label><br>
                                <select for="jenis" id="jenis" value="{{ $keuangan->jenis }}"  name="jenis" class="form-label">
                                <option value="Pemasukan" {{ ($keuangan->jenis == 'Pemasukan') ? 'selected' : '' }}>Pemasukan</option>
                                <option value="Pengeluaran" {{ ($keuangan->jenis == 'Pengeluaran') ? 'selected' : '' }}>Pengeluaran</option>
                               
                                </select>
                                <br>

                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="jika kosong isi 0" value="{{ $p->jumlah }}"  required>
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