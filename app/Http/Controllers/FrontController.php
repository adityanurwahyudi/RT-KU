<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
   
    public function register_tamu()
    {
        $data['rt'] = DB::table('users')->select('rt')
                ->whereNotNull('rt')
                ->groupBy('rt')
                ->get();
        $data['rw'] = DB::table('users')->select('rw')
                ->whereNotNull('rw')
                ->groupBy('rw')
                ->get();

        return view('registertamu',$data);
    }
    
    public function getEmail()
    {
        $email = $_GET['email'];
        $data=DB::table('users')
        ->where('email',$email)
        ->get();
        if(count($data)>0)
        {
        $check=true;
        }else{
            $check=false;
        }

        echo $check;
    }
    public function getTelpon()
    {
        $telpon = $_GET['telpon'];
        $data=DB::table('users')
        ->where('telpon',$telpon)
        ->get();
        if(count($data)>0)
        {
        $check=true;
        }else{
            $check=false;
        }

        echo $check;
    }
}
