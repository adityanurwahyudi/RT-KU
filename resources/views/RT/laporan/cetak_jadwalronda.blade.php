<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Jadwal Ronda</h4>
	</center>
 

    <div class="card mb-4">
       
        <div class="card-body">
            <br>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-condensed" id="ronda-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        getData();
        $('#filter_tanggal').change(function(){
            getData();
        })
    });

    function getData(){
        var table = $('#ronda-table').DataTable();
        var tanggal = $('#filter_tanggal').val();
        $.get("{{ URL::to('/RT/jadwal-ronda/datatable') }}",{tanggal:tanggal},function(res){
            // var data = JSON.parse(res);
            $.each(res, function(i, val){
                table.row.add([
                    i+1,
                    val.name,
                    tgl_indo(val.tanggal),
                    '<a title="Edit" href="{{ url("/RT/jadwal-ronda/edit/") }}/'+val.id+'" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;'+
                    '<button title="Delete" class="btn btn-danger" onclick="hapus('+val.id+')"> <i class="fa fa-trash"></i> Delete</button>'
                ]).draw();
            })
        });
        table.clear();
    }

    function tgl_indo(tgl){
        var mydate = new Date(tgl);
        var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"][mydate.getMonth()];
        return mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
    }

</script>
@endsection 
</body>
</html>