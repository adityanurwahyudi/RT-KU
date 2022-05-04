<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;


class GaleriController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;
		
		$foto = DB::table('foto')
				->select('foto.*')
				->leftjoin('users','users.id','foto.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get ();
		$video = DB::table('video')
				->select('video.*')
				->leftjoin('users','users.id','video.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
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
		$id_users = Auth::guard('admin')->user()->id;
			
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/foto';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('foto')->insert([
				'id_users'	=> $id_users,
				'gambar' => $namefile,
			]);
			return redirect('RT/galeri')->with(['success'=>'Data Berhasil Ditambahkan!']);
	}
	public function proses1(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;
			
		DB::table('video')->insert([
			'id_users'	=> $id_users,
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