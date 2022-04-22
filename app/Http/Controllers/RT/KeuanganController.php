<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class KeuanganController extends Controller
{
	public function index()
	{
		$qris = DB::table('qris')->get();
		$pemasukanpengeluaran = DB::table('pemasukanpengeluaran')->get();
		$no = 1;
		$No = 1;
		$NO = 1;
		return view('RT.keuangan', compact('qris','pemasukanpengeluaran', 'no', 'No','NO',));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_qris');
	}
	public function tambah1()
	{
		return view('RT.formcreate.c_pemasukanpengeluaran');
	}
//qris
	public function proses(Request $request)
	{
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/qris';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('qris')->insert([
			'nama' =>  $request->nama,
			'gambar' => $namefile,
			]);
			Session::flash('success', "Success!");
			return redirect('RT/keuangan');
	}
	//pemasukan dan pengeluaran
	public function proses1(Request $request)
	{
			if($request->hasFile('bukti')){
				$file = $request->file('bukti');
				$path = 'upload/kas';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$bukti = DB::table('pemasukanpengeluaran')->insert([
			'nama' =>  $request->nama,	
			'tanggal' =>  $request->tanggal,	
			'bulan' =>  $request->bulan,
			'metodepembayaran' =>  $request->metodepembayaran,	
			'pemasukan' =>  $request->pemasukan,
			'pengeluaran' =>  $request->pengeluaran,
			'keterangan' =>  $request->keterangan,
			'bukti' => $namefile,
			'status' =>  $request->status,	
			]);
			Session::flash('success', "Success!");
			return redirect('RT/keuangan');
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
				  
			$gambar = DB::table('pemasukanpengeluaran')->insert([
			'nama' =>  $request->nama,	
			'tanggal' => date('Y-m-d'),	
			'bulan' =>  $request->bulan,
			'metodepembayaran' =>  $request->metodepembayaran,	
			'pemasukan' =>  $request->pemasukan,
			'bukti' => $namefile,
			'status' =>  $request->status,	
			]);
			Session::flash('success', "Success!");
			return redirect('warga/keuangan');
	}
	public function hapus($id)
	{
		DB::table('qris')->where('id', $id)->delete();
		DB::table('pemasukanpengeluaran')->where('id', $id)->delete();
		return redirect('RT/keuangan');
	}
}