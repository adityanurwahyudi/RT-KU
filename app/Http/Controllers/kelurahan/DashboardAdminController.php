<?php

namespace App\Http\Controllers\kelurahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Kehadiran;

class DashboardAdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data['user'] = Auth::user();
        $data['rw'] = DB::table('users')->select('rw')->whereNotNull('rw')->groupBy('rw')->get();
        $data['rt'] = DB::table('users')->select('rt')->whereNotNull('rt')->groupBy('rt')->get();
        
        return view('kelurahan.dashboard_admin', $data);
    }

    public function getJenisKelamin()
    {
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $data['laki'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('jeniskelamin','Laki-laki')
                    ->count();
        $data['perempuan'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('jeniskelamin','Perempuan')
                    ->count();

        echo json_encode($data);
    }

    public function getAgama()
    {
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $data['islam'] = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->whereNotNull('rw')
                        ->whereNotNull('rt')
                        ->when($rw, function($q, $rw){
                            $q->where('users.rw', $rw);
                        })
                        ->when($rt, function($q, $rt){
                            $q->where('users.rt', $rt);
                        })
                        ->where('agama','islam')->count();
        $data['protestan'] = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->whereNotNull('rw')
                        ->whereNotNull('rt')
                        ->when($rw, function($q, $rw){
                            $q->where('users.rw', $rw);
                        })
                        ->when($rt, function($q, $rt){
                            $q->where('users.rt', $rt);
                        })
                        ->where('agama','protestan')->count();
        $data['katholik'] = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->whereNotNull('rw')
                        ->whereNotNull('rt')
                        ->when($rw, function($q, $rw){
                            $q->where('users.rw', $rw);
                        })
                        ->when($rt, function($q, $rt){
                            $q->where('users.rt', $rt);
                        })
                        ->where('agama','katholik')->count();
        $data['buddha'] = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->whereNotNull('rw')
                        ->whereNotNull('rt')
                        ->when($rw, function($q, $rw){
                            $q->where('users.rw', $rw);
                        })
                        ->when($rt, function($q, $rt){
                            $q->where('users.rt', $rt);
                        })
                        ->where('agama','buddha')->count();
        $data['khonghucu'] = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->whereNotNull('rw')
                        ->whereNotNull('rt')
                        ->when($rw, function($q, $rw){
                            $q->where('users.rw', $rw);
                        })
                        ->when($rt, function($q, $rt){
                            $q->where('users.rt', $rt);
                        })
                        ->where('agama','khonghucu')->count();

        echo json_encode($data);
    }

    public function getKewarganegaraan()
    {
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $data['wni'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('kewarganegaraan','WNI')
                    ->count();
        $data['wna'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('kewarganegaraan','WNA')
                    ->count();

        echo json_encode($data);
    }

    public function getPerkawinan()
    {
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $data['menikah'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('statuspernikahan','Menikah')
                    ->count();
        $data['belum'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('statuspernikahan','Belum_Menikah')
                    ->count();

        $data['cerai'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->where('statuspernikahan','Cerai')
                    ->count();

        echo json_encode($data);
    }

    public function getTable()
    {
        $rw = $_GET['rw'];
        $rt = $_GET['rt'];
        $data = DB::table('users')->select('users.*','detail_users.jeniskelamin','detail_users.agama')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rw')
                    ->whereNotNull('rt')
                    ->when($rw, function($q, $rw){
                        $q->where('users.rw', $rw);
                    })
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        echo json_encode($data);
    }
}
