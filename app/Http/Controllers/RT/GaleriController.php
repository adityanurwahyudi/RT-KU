<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class GaleriController extends Controller
{
	public function index()
	{
		$foto = DB::table('foto')->get();
		$video = DB::table('video')->get();
		$no = 1;
		$No = 1;
		return view('RT.galeri', compact('foto', 'video', 'no', 'No',));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_foto');
	}
	public function add()
	{
		return view('RT.formcreate.c_video');
	}
	public function proses(Request $request)
	{
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/foto';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('foto')->insert([
				'gambar' => $namefile,
			]);
			return redirect('RT/galeri')->with(['success'=>'Data Berhasil Ditambahkan!']);
	}
	public function proses1(Request $request)
	{
		DB::table('video')->insert([
			'nama' => $request->nama,
			'URLVideo' => $request->URLVideo,
		]);
		return redirect('RT/galeri')->with(['success'=>'Data Berhasil Ditambahkan!']);
	}
    public function edit($id)
	{
		$video = DB::table('video')->where('id', $id)->get();
		return view('RT.formedit.e_video', ['video' => $video]);
	}
    public function update(Request $request)
	{
		DB::table('video')->where('id', $request->id)->update([
			'nama' => $request->nama,
			'URLVideo' => $request->URLvideo
		]);
	return redirect('RT/galeri')->with(['success'=>'Data Berhasil Diupdate!']);
	}
	public function hapus($id)
	{
		DB::table('foto')->where('id', $id)->delete();
		DB::table('video')->where('id', $id)->delete();
		return redirect('RT/galeri');
	}
}