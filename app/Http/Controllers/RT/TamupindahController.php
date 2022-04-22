<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TamupindahController extends Controller
{
	public function index()
	{
		$tamu = DB::table('tamu')->get();
		$pindah = DB::table('pindah')->get();
		$no = 1;
		$No = 1;
		return view('RT.keluarmasukwarga', compact('tamu', 'pindah', 'no', 'No',));
	}
	public function proses(Request $request)
	{
        DB::table('tamu')->insert([
			'nama' => $request->nama,
			'email' => $request->email,
            'telepon' => $request->telepon,
			'tanggal' => $request->tanggal,
			'alamatdahulu' => $request->alamatdahulu,
            'alamatterkini' => $request->alamatterkini,
			'status' => $request->status,
			'RT' => $request->RT,
			'RW' => $request->RW,
		]);
		return redirect('/')->with(['success'=>'Data Berhasil Terkirim!']);;
	
	}public function proses1(Request $request)
	{
		DB::table('pindah')->insert([
			'nama' => $request->nama,
			'tanggal' => $request->tanggal,
            'alamat' => $request->alamat,
			'alamatpindah' => $request->alamatpindah,
			'deskripsi' => $request->deskripsi,
		]);
		return redirect('warga/index')->with(['success'=>'Data Berhasil Terkirim!']);;
	
	}
	public function hapus($id)
	{
		DB::table('tamu')->where('id', $id)->delete();
		DB::table('pindah')->where('id', $id)->delete();
		return redirect('RT/keluarmasukwarga');
	}
}