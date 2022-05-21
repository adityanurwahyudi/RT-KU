<?php

    if(!function_exists('tgl_indo')){
        function tgl_indo($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    if(!function_exists('getUser')){
        function getUser($id)
        {
            $user = DB::table('users')->where('id', $id)->first();

            return $user;
        }
    }

    if(!function_exists('getJumlahTanggungan')){
        function getJumlahTanggungan($id)
        {
            $data = DB::table('master_jumlah_tanggungan')->where('id', $id)->first();

            return $data;
        }
    }

    if(!function_exists('getKendaraan')){
        function getKendaraan($id)
        {
            $data = DB::table('master_kendaraan')->where('id', $id)->first();

            return $data;
        }
    }
    if(!function_exists('getPekerjaan')){
        function getPekerjaan($id)
        {
            $data = DB::table('master_pekerjaan')->where('id', $id)->first();

            return $data;
        }
    }
    if(!function_exists('getPenghasilan')){
        function getPenghasilan($id)
        {
            $data = DB::table('master_penghasilan')->where('id', $id)->first();

            return $data;
        }
    }
    if(!function_exists('notification')){
        function notification($id_users)
        {
            $data = DB::table('notification')->where('id_penerima', $id_users)->where('is_read',false)->get();

            return ($data) ? $data : array();
        }
    }
    if(!function_exists('PushNotification')){
        function PushNotification($url, $deskripsi, $id_users, $id_penerima)
        {
            $notif = [
                'url'           => url($url),
                'deskripsi'     => $deskripsi,
                'id_pengirim'   => $id_users,
                'id_penerima'   => $id_penerima,
                'created_at'    => date('Y-m-d H:i:s'),
                'is_read'       => false
            ];
            DB::table('notification')->insert($notif);
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'dc54755d5048301338f6',
                'e1ce7abf10d456b68339',
                '1403900',
                $options
            );
        
            $data['message'] = 'hello world';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
    }
    if(!function_exists('getRangeUsia')){
        function getRangeUsia($awal, $akhir)
        {
            
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
            $data = DB::table('detail_users')
            ->join ('users','users.id','detail_users.id_users')
                    ->where('usia', '>=', $awal)
                    ->where('usia', '<=',$akhir)
                    ->where('rt',$rt) 
                    ->where('rw',$rw) 
                    ->count();

            return $data;
        }
    }
    
?>