<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use App\Models\masterEvent;
use App\Models\tiketEvent;
use App\Models\Kehadiran;
use Exception;
use Hash;

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



}
