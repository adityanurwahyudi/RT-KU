
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('/sbadmin/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('/sbadmin/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/sbadmin/assets/demo/chart-bar-demo.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{asset('/sbadmin/js/datatables-simple-demo.js')}}"></script>

    {{-- <script src="{{asset('/sbadmin/plugins/bootstrap/js/popper.js')}}"></script> --}}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    {{-- Highchart --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = false;

        var pusher = new Pusher('dc54755d5048301338f6', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            $.get("{{ URL::to('/RT/notification') }}",function(result){
                var res = JSON.parse(result);
                var html = '';
                $.each(res.data, function(i, val){
                    html += '<a href="'+val.url+'?id_notif='+val.id+'" class="waves-effect waves-block">';
                    html += '<li>';
                    html += '<div class="row">';
                    html += '<div class="col-sm-1" style="margin:5px;">';
                    html += '<div class="icon-circle bg-light-green">';
                    html += '<i class="fa fa-user"></i>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-sm-10">';
                    html += '<div class="col-sm-12">';
                    html += '<div class="menu-info">';
                    html += '<span>'+val.deskripsi+'</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-sm-12">';
                    html += '<i class="badge badge-primary">';
                    html += '<i class="fa fa-clock"></i>'+val.created_at+'';
                    html += '</i>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</li>';
                    html += '</a>';

                });
                $('#bodyNotifikasi').html(html);
                $('#badgeNotifikasi').text(res.count);
                $('#headerNotifikasi').text(res.count+' NOTIFICATION');
            })
        });
    </script>
