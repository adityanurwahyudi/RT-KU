<?php

namespace App\Http\Controllers\RT;

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
        

        $kepentingan = DB::table('bobot_kepentingan')->sum('rating_kepentingan');
        $data['kepentingan'] = $kepentingan / 2;
        

        $data['detail_users'] = DB::table('detail_users')->select('detail_users.*','users.name','users.email','users.telpon')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->get();
    //count jenis kelamin
        $data['lakilaki'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Laki-laki') 
                    ->count();
        $data['perempuan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('jeniskelamin','Perempuan') 
                    ->count();
                    // count usia
        $data['usia'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)
                    ->count();
        //count kewarganegaraan
        $data['WNI'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNI') 
                    ->count();
        $data['WNA'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('kewarganegaraan','WNA') 
                    ->count();     
        //count status pernikahan
        $data['Menikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Menikah') 
            ->count();
        $data['BelumMenikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','BelumMenikah') 
            ->count();
         $data['Cerai'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Cerai') 
            ->count();

            //count pengaduan
            $data['Keamanan'] = DB::table('pengaduan')->select('users.*')
            ->leftjoin('users','users.id','pengaduan.id_users')
                                ->where('rt',$rt)
                                ->where('rw',$rw) 
                                ->where('kategori','Keamanan') 
                                ->count();
            $data['Sampah'] = DB::table('pengaduan')->select('users.*')
            ->leftjoin('users','users.id','pengaduan.id_users')
                                ->where('rt',$rt)
                                ->where('rw',$rw) 
                                ->where('kategori','Sampah') 
                                ->count();
            $data['Kejahatan'] = DB::table('pengaduan')->select('users.*')
            ->leftjoin('users','users.id','pengaduan.id_users')
                                ->where('rt',$rt)
                                ->where('rw',$rw) 
                                ->where('kategori','Kejahatan') 
                                ->count();
            $data['Infrastruktur'] = DB::table('pengaduan')->select('users.*')
            ->leftjoin('users','users.id','pengaduan.id_users')
                                ->where('rt',$rt)
                                ->where('rw',$rw) 
                                ->where('kategori','Infrastruktur') 
                                ->count();
            $data['Lingkungan'] = DB::table('pengaduan')->select('users.*')
            ->leftjoin('users','users.id','pengaduan.id_users')
                                ->where('rt',$rt)
                                ->where('rw',$rw) 
                                ->where('kategori','Lingkungan') 
                                ->count();

        //count agama             
        $data['islam'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','islam') 
                    ->count();
        $data['katholik'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','katholik') 
                    ->count();
       $data['protestan'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','protestan') 
                    ->count();
        $data['hindu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','hindu') 
                    ->count();
        $data['buddha'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','buddha') 
                    ->count();
        $data['konghucu'] = DB::table('detail_users')->select('detail_users.*')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->where('agama','khonghucu') 
                    ->count();
        $data['normalisasi'] = DB::table('hasil_normalisasi')
                    ->join('users','users.id','hasil_normalisasi.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->orderBy('rank','DESC') 
                    ->get();
        return view('RT.dashboard_admin', $data);
    }
}
