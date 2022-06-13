<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Kehadiran;
use PDF;
use Hash;
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


        $menikah = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            })
        ->where('statuspernikahan','Menikah')->count();
        
        $belummenikah = DB::table('users')
                ->leftjoin('detail_users','detail_users.id_users','users.id')
                ->where('rw', $rw)
                ->when($rt, function($q,$rt){
                $q->where('rt', $rt);
                })
            ->where('statuspernikahan','BelumMenikah')->count();
        
        $cerai = DB::table('users')
                ->leftjoin('detail_users','detail_users.id_users','users.id')
                ->where('rw', $rw)
                ->when($rt, function($q,$rt){
                $q->where('rt', $rt);
                })
            ->where('statuspernikahan','Cerai')->count();

        echo json_encode([
            'menikah' => $menikah,
            'belummenikah' => $belummenikah,
            'cerai' => $cerai,
        ]);
    }
    public function wargaBerdasarkanJenisKelamin()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];

        $Lakilaki = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('rw', $rw)
        ->when($rt, function($q,$rt){
        $q->where('rt', $rt);
        })
    ->where('jeniskelamin','Laki-laki')->count();
    
    $Perempuan = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            })
        ->where('jeniskelamin','Perempuan')->count();

    echo json_encode([
        'Lakilaki' => $Lakilaki,
        'Perempuan' => $Perempuan,
      
        ]);
    }
    public function wargaBerdasarkanAgama()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];

        $islam = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('rw', $rw)
        ->when($rt, function($q,$rt){
        $q->where('rt', $rt);
        })
    ->where('agama','islam')->count();
    
    $katholik = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            })
        ->where('agama','katholik')->count();$islam = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('rw', $rw)
        ->when($rt, function($q,$rt){
        $q->where('rt', $rt);
        })
    ->where('agama','islam')->count();
    
    $protestan = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            })
        ->where('agama','protestan')->count();
    $hindu = DB::table('users')
                ->leftjoin('detail_users','detail_users.id_users','users.id')
                ->where('rw', $rw)
                ->when($rt, function($q,$rt){
                $q->where('rt', $rt);
                })
        ->where('agama','hindu')->count();
    $khonghucu = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->where('rw', $rw)
                    ->when($rt, function($q,$rt){
                    $q->where('rt', $rt);
                    })
        ->where('agama','khonghucu')->count();
    $buddha = DB::table('users')
                        ->leftjoin('detail_users','detail_users.id_users','users.id')
                        ->where('rw', $rw)
                        ->when($rt, function($q,$rt){
                        $q->where('rt', $rt);
                        })
            ->where('agama','buddha')->count();

    echo json_encode([
        'islam' => $islam,
        'katholik' => $katholik,
        'protestan' => $protestan,
        'hindu' => $hindu,
        'khonghucu' => $khonghucu,
        'buddha' => $buddha,
      
        ]);
    }
    public function wargaBerdasarkanKewarganegaraan()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];

        $WNI = DB::table('users')
        ->leftjoin('detail_users','detail_users.id_users','users.id')
        ->where('rw', $rw)
        ->when($rt, function($q,$rt){
        $q->where('rt', $rt);
        })
    ->where('kewarganegaraan','WNI')->count();
    
    $WNA = DB::table('users')
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->where('rw', $rw)
            ->when($rt, function($q,$rt){
            $q->where('rt', $rt);
            })
        ->where('kewarganegaraan','WNA')->count();

    echo json_encode([
        'WNI' => $WNI,
        'WNA' => $WNA,
      
        ]);
    }
    
    public function getTableWarga()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];
        $data = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->where('rw',$rw)
                    ->whereNotNull('rt')
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        echo json_encode($data);
    }
    
    public function getTable()
    {
        $rt = $_GET['rt'];
        $data = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rt')
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        echo json_encode($data);
    } 

    public function getTablePengaduan()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];
        $data = DB::table('pengaduan')
                    ->leftjoin('users','users.id','pengaduan.id_users')
                    ->where('rw',$rw)
                    ->whereNotNull('rt')
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        echo json_encode($data);
    } 
    public function ubahakunn()
    {
       
            $id_users = Auth::guard('admin')->user()->id;
            $users['users'] = DB::table('users')
            ->where('id',$id_users)
            ->orderBy('id','ASC')
            ->first();

        return view('RW.ubahakunn' ,$users);
    }
    public function rw_update(Request $request)
    {
        try{
            $data = [
                'name'          => $request->nama,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'password_real' => $request->password
            ];
            DB::table('users')->where('id', $request->id)->update($data);

            return redirect("RW/dashboard-rw")->with(['success'=>'Data Update']);
        }catch(Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Update'.$e]);
        }
    }
    
    public function getTableKritik()
    {
        $rw = Auth::guard('admin')->user()->rw;
        $rt = $_GET['rt'];
        $data = DB::table('kritiksaran')
                    ->leftjoin('users','users.id','kritiksaran.id_users')
                    ->where('rw',$rw)
                    ->whereNotNull('rt')
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        echo json_encode($data);
    }
    public function cetak_table_pdf($rt)
    {

        $rw = Auth::guard('admin')->user()->rw;
        $rt = ($rt!=0) ? $rt : null;

        $data['no']= 1;
        $data['data'] = DB::table('users')
                    ->leftjoin('detail_users','detail_users.id_users','users.id')
                    ->whereNotNull('rt')
                    ->where('rw',$rw)
                    ->when($rt, function($q, $rt){
                        $q->where('users.rt', $rt);
                    })
                    ->get();

        // return view('rw.cetak_pdf_dashboard', $data);
        $size_paper = [0, 0, 595.28, 841.89];
        $pdf = PDF::setOptions([
            'isRemoteEnabled' => true,
            'images' => true,
        ])
        ->loadView('RW.cetak_pdf_dashboard', $data)
        ->setPaper($size_paper, 'landscape');
        return $pdf->stream('Data Warga Dashboard RW.pdf');
    }

}
