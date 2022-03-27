<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;

class PenentuanWargaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function SPKWarga()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no']= 1;
        $data['no_normalisasi'] = 1;
        $data['no_rank'] = 1;

        $kepentingan = DB::table('bobot_kepentingan')->sum('rating_kepentingan');
        $data['kepentingan'] = $kepentingan / 2;

        $data['users'] = DB::table('users')
                    ->join('detail_users','detail_users.id_users','users.id')
                    ->join('hasil_normalisasi','hasil_normalisasi.id_users','users.id')
                    ->where('rt',$rt)
                    ->where('rw',$rw)
                    ->orderBy('rank','DESC') 
                    ->get();

        $data['normalisasi'] = DB::table('hasil_normalisasi')
                    ->join('users','users.id','hasil_normalisasi.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->orderBy('rank','DESC') 
                    ->get();

        return view('RT.SPKwarga', $data);
    }

}
