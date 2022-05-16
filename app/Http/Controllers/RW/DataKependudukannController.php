<?php

namespace App\Http\Controllers\RW;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use DB;
use Auth;
use PDF;

class DataKependudukannController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function datatable()
    {
        $rt = $_GET['rt'];
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;

        $rt = DB::table('detail_users')->select('detail_users.*','users.name')
                ->join('users','users.id','detail_users.id_users')
                ->where('rt', $rt)
                ->orderBy('rt','ASC')
                ->get();

        return $rt;
    }
    public function datawarga()
    { 
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
        return view('RW.datawarga',$data);
    }


	public function cetak_datawarga()
    {
    	$datakependudukan = DB::table('datakependudukan')->get ();
 
    	$pdf = PDF::loadview('RW.laporan.cetak_datawarga',['datakependudukan'=>$datakependudukan]);
    	return $pdf->stream();
    }
    
    public function kendaraan()
    {
        $no = 1;   
        $kendaraan = DB::table('kendaraan') ->get();

		return view('RW.kendaraan',
		compact('kendaraan','no'));
    }
    
	public function cetak_kendaraan()
    {
        $rt = Auth::guard('admin')->user()->rt;
		
		$kendaraan = DB::table('kendaraan')
				->get ();
 
    	$pdf = PDF::loadview('RW.laporan.cetak_kendaraan',['kendaraan'=>$kendaraan]);
    	return $pdf->stream();
    }
    public function pengaduan()
    {
        $no = 1;   
        $pengaduan = DB::table('pengaduan')  
                    ->get();

		return view('RW.pengaduan',
		compact('pengaduan','no'));
    }
    
	public function cetak_pengaduan()
    {
        $rt = Auth::guard('admin')->user()->rt;
		
		$pengaduan = DB::table('peng$pengaduan')
				->get ();
 
    	$pdf = PDF::loadview('RW.laporan.cetak_pengaduan',['peng$pengaduan'=>$pengaduan]);
    	return $pdf->stream();
    }
	public function keluarmasukwarga()
	{
		$tamu = DB::table('tamu')->get();
		$pindah = DB::table('pindah')->get();
		$no = 1;
		$No = 1;
		return view('RW.keluarmasukwarga', compact('tamu', 'pindah', 'no', 'No',));
	}
    
	public function cetak_tamu()
    {
        
		$tamu = DB::table('tamu')->get();
 
    	$pdf = PDF::loadview('RW.laporan.cetak_tamu',['tamu'=>$tamu]);
    	return $pdf->stream();
    }
    
	public function cetak_pindah()
    {
		
		$pindah = DB::table('pindah')->get();
 
    	$pdf = PDF::loadview('RW.laporan.cetak_pindah',['pindah'=>$pindah]);
    	return $pdf->stream();
    }
    public function kritiksaran()
    {
        $no = 1;   
        $kritiksaran = DB::table('kritiksaran')
                    ->join('users','users.id','kritiksaran.id_users')    
                    ->get();

		return view('RW.kritiksaran',
		compact('kritiksaran','no'));
    }
    
    }
