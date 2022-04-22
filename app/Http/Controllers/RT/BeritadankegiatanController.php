<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BeritadankegiatanController extends Controller
{
	public function index()
	{
		$berita = DB::table('berita')->get();
		$kegiatan = DB::table('kegiatan')->get();
		$no = 1;
		$No = 1;
		return view('RT.beritadankegiatan', compact('berita', 'kegiatan', 'no', 'No',));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_berita');
	}
	public function tambah1()
	{
		return view('RT.formcreate.c_kegiatan');
	}
	public function proses(Request $request)
	{
		//dd($request);		
			// $this->validate($request, [
			// 		'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
			// ]);
			
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/berita';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('berita')->insert([
				'nama' =>  $request->nama,
				'deskripsi' =>  $request->deskripsi,
				'gambar' => $namefile,
				'tanggal'	=> date('Y-m-d'),
			]);
			return redirect('RT/beritadankegiatan')->with(['success'=>'Data Berhasil Ditambahkan!']);
	
	}
	public function proses1(Request $request)
	{
			
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/kegiatan';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('kegiatan')->insert([
				'nama' =>  $request->nama,
				'deskripsi' =>  $request->deskripsi,
				'gambar' => $namefile,
				'tanggal'	=> date('Y-m-d'),
			]);
			return redirect('RT/beritadankegiatan')->with(['success'=>'Data Berhasil Ditambahkan!']);;
	
	}
	public function edit($id)
	{
		$berita = DB::table('berita')->where('id', $id)->get();
		return view('RT.formedit.e_berita', ['berita' => $berita]);
	}
    public function edit1($id)
	{
		$kegiatan = DB::table('kegiatan')->where('id', $id)->get();
		return view('RT.formedit.e_kegiatan', ['kegiatan' => $kegiatan]);
	}
    public function update(Request $request)
	{
		$berita = DB::table('berita')->where('id',$request->id)->first();
		if($request->hasFile('gambar')){
			$file = $request->file('gambar');
			$path = 'upload/berita';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
		}else{
			$namefile = $berita->gambar;
		}
			  
		$gambar = DB::table('berita')->where('id', $request->id)->update([
			'nama' =>  $request->nama,
			'deskripsi' =>  $request->deskripsi,
			'gambar' => $namefile,
			'tanggal'	=> date('Y-m-d'),
		]);

		return redirect('RT/beritadankegiatan')->with(['success'=>'Data Berhasil Diupdate!']);;
	
	}
    public function update1(Request $request)
	{
		$kegiatan = DB::table('kegiatan')->where('id',$request->id)->first();
		if($request->hasFile('gambar')){
			$file = $request->file('gambar');
			$path = 'upload/kegiatan';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
		}else{
			$namefile = $kegiatan->gambar;
		}
			  
		$gambar = DB::table('kegiatan')->where('id', $request->id)->update([
			'nama' =>  $request->nama,
			'deskripsi' =>  $request->deskripsi,
			'gambar' => $namefile,
			'tanggal'	=> date('Y-m-d'),
		]);
		return redirect('RT/beritadankegiatan')->with(['success'=>'Data Berhasil Diupdate!']);
	}
	public function hapus($id)
	{
		DB::table('berita')->where('id', $id)->delete();
		DB::table('kegiatan')->where('id', $id)->delete();
		return redirect('RT/beritadankegiatan');
	}
}