<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use Exception;
use PDF;


class KeuanganController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		
		$keuangan = DB::table('keuangan')->select('keuangan.*')
		->leftjoin('users','users.id','keuangan.id_users')
		->where('users.rw', $rw)
		->orderBy('id','asc')
		->where('users.rt', $rt)
		->get();

		$no = 1;
		$No = 1;
		$NO = 1;
		return view('RT.keuangan', compact( 'keuangan','no', 'No','NO',));
	}
	
	public function cetak_keuangan()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
		
		$keuangan = DB::table('keuangan')
				->select('keuangan.*')
				->leftjoin('users','users.id','keuangan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get ();
 
    	$pdf = PDF::loadview('RT.laporan.cetak_keuangan',['keuangan'=>$keuangan]);
    	return $pdf->stream();
    }
	public function tambahh()
	{
		return view('RT.formcreate.c_pemasukanpengeluaran');
	}

	public function proses(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;

			if($request->hasFile('bukti')){
				$file = $request->file('bukti');
				$path = 'upload/keuangan';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$total = DB::table('keuangan')
					->orderBy('id','desc')->first();
			$cek_total = !empty($total) ? $total->totalsaldo : 0;
			$jumlah = str_replace(',','.',$request->jumlah);

			if($request->jenis == "Pemasukan"){
				$total_jumlah = $cek_total + $jumlah;
			}
			else{
				if($cek_total < $jumlah){
					return redirect('RT/keuangan')->with(['error'=>'Saldo Kurang !']);
				}else{
					$total_jumlah = $cek_total - $jumlah;
				}
			}
			$bukti = DB::table('keuangan')->insert([
			'id_users'	=> $id_users,
			'tanggal' =>  $request->tanggal,
			'keterangan' =>  $request->keterangan,
			'jenis' =>  $request->jenis,
			'jumlah' =>  str_replace(',','.',$request->jumlah),
			'totalsaldo' =>  $total_jumlah,
			'bukti' => $namefile,
			]);

			return redirect('RT/keuangan')->with(['success'=>'Data Berhasil Ditambahkan!']);
	}
	public function hapus($request)
	{
		$dt = explode('_',$request);
		$id = $dt[0];
		$tanggal = $dt[1];
		$keterangan = $dt[2];
		$jenis = $dt[3];
		$jumlah = $dt[4];
		$totalsaldo = $dt[5];

		$total = DB::table('keuangan')
					->orderBy('id','desc')->first();
			$cek_total = !empty($total) ? $total->totalsaldo : 0;

			if($jenis == "Pemasukan"){
				$total_jumlah = $cek_total - $jumlah;
			}
			else{
				$total_jumlah = $cek_total + $jumlah;
			}
			
			$bukti = DB::table('keuangan')->where('id',$total->id)->update([
				'totalsaldo' =>  $total_jumlah,
			]);

		DB::table('keuangan')->where('id', $id)->delete();

		return redirect('RT/keuangan');
	}
}