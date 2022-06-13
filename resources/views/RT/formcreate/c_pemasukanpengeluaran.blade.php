@extends('template.backend.main')

@section('content')
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Create Pemasukan dan Pengeluaran</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a>Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Pemasukan dan Pengeluaran</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Create Pemasukan dan Pengeluaran
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rt.keuangan.proses') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text"  class="form-control" id="tanggallahir" name="tanggal" required>
                        </div>
                                
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Rincian</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                </div>

                                <label>Jenis Keterangan : </label><br>
                                <select for="jenis" id="jenis" class="form-control"  name="jenis" class="form-label">
                                <option value="Pemasukan">Pemasukan</option>
                                <option value="Pengeluaran">Pengeluaran</option>

                                </select>
                                <br>

                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah (Rp)</label>
                                    <input type="text" class="form-control rupiah" id="jumlah" name="jumlah" placeholder="Jumlah " required>
                                </div>

                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti" >
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-info" value="Simpan Data" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
        @endsection

@section('script')
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.rupiah').inputmask({
            alias: "decimal",
            digits: 3,
            repeat: 36,
            digitsOptional: false,
            decimalProtect: true,
            groupSeparator: ".",
            placeholder: '0',
            radixPoint: ",",
            radixFocus: true,
            autoGroup: true,
            autoUnmask: false,
            onBeforeMask: function(value, opts) {
                return value;
            },
            removeMaskOnSubmit: true
        });
    })
</script>
<script>
        $(function() {
            //$( "#tanggallahir" ).date();
            flatpickr("#tanggallahir", {
                 enableTime: false,
                 dateFormat: "Y-m-d ",
                });
        });
 
       
 
    </script>
@endsection 