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

		$qris = DB::table('qris')->select('qris.*')
				->leftjoin('users','users.id','qris.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$keuangan = DB::table('keuangan')->select('keuangan.*')
		->leftjoin('users','users.id','keuangan.id_users')
		->where('users.rw', $rw)
		->where('users.rt', $rt)
		->get();

		$no = 1;
		$No = 1;
		$NO = 1;
		return view('RT.keuangan', compact('qris', 'keuangan','no', 'No','NO',));
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
	public function tambah()
	{
		return view('RT.formcreate.c_qris');
	}
	public function tambahh()
	{
		return view('RT.formcreate.c_pemasukanpengeluaran');
	}

//qris
	public function proses(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;

			if($request->hasFile('bukti')){
				$file = $request->file('bukti');
				$path = 'upload/qris';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$bukti = DB::table('qris')->insert([
				'id_users'	=> $id_users,
			'nama' =>  $request->nama,
			'bukti' => $namefile,
			]);
			return redirect('RT/keuangan')->with(['success'=>'Data Berhasil Ditambahkan!']);;
	}
	
	//pemasukan dan pengeluaran
	public function edit($id)
	
	{
		$keuangan = DB::table('keuangan')->where('id', $id)->get();
		return view('RT.formedit.e_pemasukanpengeluaran', ['keuangan' => $keuangan]);
	}
	
	public function prosess(Request $request)
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
			  
		$bukti = DB::table('keuangan')->insert([
			'id_users'	=> $id_users,
			'tanggal' =>  $request->tanggal,
			'keterangan' =>  $request->keterangan,
			'pemasukan' =>  $request->pemasukan,
			'pengeluaran' =>  $request->pengeluaran,
			'bukti' => $namefile,
			'totalsaldo'	=> $request->totalsaldo,
		]);
		return redirect('RT/keuangan')->with(['success'=>'Data Berhasil Ditambahkan!']);;

}   
    
public function update(Request $request)
{
	$id_users = Auth::guard('admin')->user()->id;

	$keuangan = DB::table('keuangan')->where('id',$request->id)->first();
	if($request->hasFile('bukti')){
		$file = $request->file('bukti');
		$path = 'upload/keuangan';
		$namefile = uniqid().'.'.$file->getClientOriginalExtension();
		$file->move($path, $namefile);
	}else{
		$namefile = $keuangan->bukti;
	}
		  
	$bukti = DB::table('keuangan')->where('id', $request->id)->update([
		'id_users'=> $id_users,
		'nama' =>  $request->nama,
		'tanggal' =>  $request->tanggal,
		'kategori' =>  $request->kategori,
		'bulan' =>  $request->bulan,
		'jumlah' =>  $request->jumlah,
		'keterangan' =>  $request->keterangan,
		'bukti' => $namefile,
	]);

	return redirect('RT/keuangan')->with(['success'=>'Data Berhasil Diupdate!']);;

}	
	
	//konfirmasi pembayaran dari web warga
	public function proses2(Request $request)
	{
			if($request->hasFile('bukti')){
				$file = $request->file('bukti');
				$path = 'upload/konfirmasipembayaran';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$bukti = DB::table('pemasukanpengeluaran')->insert([
			'nama' =>  $request->nama,	
			'tanggal' => date('Y-m-d'),	
			'bulan' =>  $request->bulan,
			'metodepembayaran' =>  $request->metodepembayaran,	
			'pemasukan' =>  $request->pemasukan,
			'bukti' => $namefile,
			'status' =>  $request->status,	
			]);
			Session::flash('success', "Success!");
			return redirect('warga/keuangan')->with(['success'=>'Data Berhasil Terkirim!']);;
	}
	public function hapus($id)
	{
		DB::table('qris')->where('id', $id)->delete();
		DB::table('keuangan')->where('id', $id)->delete();
		return redirect('RT/keuangan');
	}
}