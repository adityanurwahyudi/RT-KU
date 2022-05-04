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
?>