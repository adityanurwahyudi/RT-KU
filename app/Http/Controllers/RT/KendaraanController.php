<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RT\Kendaraan;

class KendaraanController extends Controller
{
	public function index()
	{
		$kendaraan = DB::table('kendaraan')->get();
		$no = 1;
		return view('RT.kendaraan',
		compact('kendaraan', 'no'));
	}
	public function store(Request $request)
	{
		//dd($request->all());
		DB::table('kendaraan')->insert([
			'nama' => $request->nama,
			'nopol' => $request->nopol,
			'tanggal' => date('Y-m-d'),
			'jeniskendaraan' => $request->jeniskendaraan,
			'alamat' => $request->alamat,
			'status' => $request->status,
		]);
		return redirect('warga/data-warga')->with(['success'=>'Data Berhasil Terkirim!']);
	}
	public function edit($id)
	{
		$kendaraan = DB::table('kendaraan')->where('id', $id)->get();
		return view('RT.formedit.e_kendaraan', ['kendaraan' => $kendaraan]);
	}
	public function update(Request $request)
	{
		DB::table('kendaraan')->where('id', $request->id)->update([
			'nama' => $request->nama,
			'nopol' => $request->nopol,
			'tanggal' => date('Y-m-d'),
			'jeniskendaraan' => $request->jeniskendaraan,
			'alamat' => $request->alamat,
			'status' => $request->status,
		]);
		return redirect('RT/kendaraan')->with(['success'=>'Data Berhasil Diupdate!']);
	}
	public function hapus($id)
	{
		DB::table('kendaraan')->where('id', $id)->delete();
		return redirect('RT/kendaraan');
	}
}