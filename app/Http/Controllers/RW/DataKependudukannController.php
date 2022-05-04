<?php

namespace App\Http\Controllers\RW;

use Illuminate\View\View;
use App\Models\Kehadiran;;

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

    public function datawarga()
    {
        $No = 1;
        
		$datakependudukan = DB::table('datakependudukan')->get();   

		return view('RW.datawarga',
		compact('datakependudukan','No'));
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
