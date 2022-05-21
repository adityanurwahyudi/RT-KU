<?php

namespace App\Http\Controllers\RW;

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
        
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $data['no_normalisasi'] = 1;
        $data['no_rank'] = 1;
        

        $data['rt'] = DB::table('users')->select('rt')
                ->whereNotNull('rt')
                ->groupBy('rt')
                ->get();

        $kepentingan = DB::table('bobot_kepentingan')->sum('rating_kepentingan');
        $data['kepentingan'] = $kepentingan / 2;
        

        $data['detail_users'] = DB::table('detail_users')->select('detail_users.*','users.name','users.email','users.telpon')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->get();
    //count jenis kelamin
        $data['lakilaki'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Laki-laki') 
                    ->count();
        $data['perempuan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Perempuan') 
                    ->count();
        //count kewarganegaraan
        $data['WNI'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNI') 
                    ->count();
        $data['WNA'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNA') 
                    ->count();
                    
        //count status pernikahan
        $data['Menikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rw',$rw) 
            ->where('statuspernikahan','Menikah') 
            ->count();
        $data['BelumMenikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rw',$rw) 
            ->where('statuspernikahan','BelumMenikah') 
            ->count();
         $data['Cerai'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rw',$rw) 
            ->where('statuspernikahan','Cerai') 
            ->count();

        //count agama             
        $data['islam'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','islam') 
                    ->count();
        $data['katholik'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','katholik') 
                    ->count();
       $data['protestan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','protestan') 
                    ->count();
        $data['hindu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','hindu') 
                    ->count();
        $data['buddha'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','buddha') 
                    ->count();
        $data['konghucu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rw',$rw) 
                    ->where('agama','konghucu') 
                    ->count();
        return view('RW.dashboard_admin', $data);
    }

    public function getWargaBerdasarkanUsia()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];

            

        $pertama = DB::table('users')
                ->leftjoin('detail_users','detail_users.id_users','users.id')
                ->where('users.status', 1)
                ->where('users.rw', $rw)
                ->when($rt, function($q,$rt){
                    $q->where('users.rt', $rt);
                })
                ->where('usia','>=',0)->where('usia','<=',10)->count();
        $kedua =  DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('users.status', 1)
            ->where('users.rw', $rw)
            ->when($rt, function($q,$rt){
                $q->where('users.rt', $rt);
            })
        ->where('usia','>=',11)->where('usia','<=',25)->count();

        $ketiga =DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('users.status', 1)
        ->where('users.rw', $rw)
        ->when($rt, function($q,$rt){
            $q->where('users.rt', $rt);
        }) 
        ->where('usia','>=',26)->where('usia','<=',40)->count();
        $keempat = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('users.status', 1)
        ->where('users.rw', $rw)
        ->when($rt, function($q,$rt){
            $q->where('users.rt', $rt);
        })
        ->where('usia','>=',41)->where('usia','<=',60)->count();
        $kelima = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('users.status', 1)
        ->where('users.rw', $rw)
        ->when($rt, function($q,$rt){
            $q->where('users.rt', $rt);
        })
        ->where('usia','>=',61)->where('usia','<=',90)->count();

        echo json_encode([
            'pertama' => $pertama,
            'kedua' => $kedua,
            'ketiga' => $ketiga,
            'keempat' => $keempat,
            'kelima' => $kelima,
        ]);
    }
    
    public function wargaBerdasarkanStatusPernikahan()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];

        $data = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            });

        $menikah = $data->where('statuspernikahan','Menikah')->count();
        $belummenikah = $data->where('statuspernikahan','BelumMenikah')->count();
        $cerai = $data->where('statuspernikahan','Cerai')->count();

        echo json_encode([
            'menikah' => $menikah,
            'belummenikah' => $belummenikah,
            'cerai' => $cerai,
        ]);
    }
}
