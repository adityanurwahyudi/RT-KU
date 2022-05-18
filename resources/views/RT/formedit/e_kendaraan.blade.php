@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Kendaraan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Kendaraan</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Edit Kendaraan
                        </div>

                        <div class="card-body">                          
                            @php
                            $p = $kendaraan
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
                            <form action="{{ route('admin.rt.kendaraan.update') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @foreach($kendaraan as $p)
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $p->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Pemilik</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $p->nama }}"
                                       readonly >
                                </div>
                                <div class="mb-3">
                                    <label for="nopol" class="form-label">Nomer Plat Kendaraan</label>
                                    <input type="text" class="form-control" id="nopol" name="nopol" value="{{ $p->nopol }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="jeniskendaraan" class="form-label">Jenis Kendaraan</label>
                                    <input  type="text" class="form-control" id="jeniskendaraan" name="jeniskendaraan" value="{{ $p->jeniskendaraan }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Pengajuan</label>
                                    <input  type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $p->tanggal }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $p->alamat }}" readonly >
                                </div>
                                <label>Status :</label><br>
                                <select for="statuspermohonan" id="statuspermohonan" value="{{ $p->statuspermohonan }}"  name="statuspermohonan" class="form-label">
                                <option value="proses" {{ ($kendaraan->statuspermohonan == 'proses') ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ ($kendaraan->statuspermohonan == 'selesai') ? 'selected' : '' }}>Selesai</option>
                                <option value="sudah di ambil" {{ ($kendaraan->statuspermohonan == 'sudah di ambil') ? 'selected' : '' }}>Sudah di ambil</option>
                                </select>
                                <br>
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
@endsection 