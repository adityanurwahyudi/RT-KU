<?php
namespace App\Http\Controllers\kelurahan;


use Illuminate\View\View;
use App\Models\Kehadiran;;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;
use PDF;

class DataKependudukanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datawarga()
    {   
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
        
    $data['rt'] = DB::table('users')->select('rt')
        ->whereNotNull('rt')
        ->groupBy('rt')
        ->get();
    $data['rw'] = DB::table('users')->select('rw')
        ->whereNotNull('rw')
        ->groupBy('rw')
        ->get();
        
    $data['detail_users'] = DB::table('detail_users')->select('detail_users.*','users.name','users.email','users.telpon')
                    ->join('users','users.id','detail_users.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw) 
                    ->get();
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
        $data['Belum_Menikah'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Belum_Menikah') 
            ->count();
         $data['Cerai'] = DB::table('detail_users')->select('detail_users.*')
            ->join('users','users.id','detail_users.id_users')
            ->where('rt',$rt)
            ->where('rw',$rw) 
            ->where('statuspernikahan','Cerai') 
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
                    ->where('agama','konghucu') 
                    ->count();
        $data['normalisasi'] = DB::table('hasil_normalisasi')
                    ->join('users','users.id','hasil_normalisasi.id_users')
                    ->where('rt',$rt)
                    ->where('rw',$rw)   
                    ->orderBy('rank','DESC') 
                    ->get();
       

return view('kelurahan.datawarga',$data);
    }
    
    }
