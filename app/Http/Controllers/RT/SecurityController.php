<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SecurityController extends Controller
{
	public function index()
	{
		$security = DB::table('security')->get();
		$no = 1;
		return view('RT.security', compact('security', 'no'));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_security');
	}
	public function proses(Request $request)
	{
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/security';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('security')->insert([
				'nama' =>  $request->nama,
				'telepon' =>  $request->telepon,
				'gambar' => $namefile,
			]);
			return redirect('RT/security')->with(['success'=>'Data Berhasil Ditambahkan!']);
	
	}
	public function edit($id)
	{
		$security = DB::table('security')->where('id', $id)->get();
		return view('RT.formedit.e_security', ['security' => $security]);
	}
    public function update(Request $request)
	{
		$security = DB::table('security')->where('id',$request->id)->first();
		if($request->hasFile('gambar')){
			$file = $request->file('gambar');
			$path = 'upload/security';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
		}else{
			$namefile = $security->gambar;
		}
			  
		$gambar = DB::table('security')->where('id', $request->id)->update([
			'nama' =>  $request->nama,
			'telepon' =>  $request->telepon,
			'gambar' => $namefile,
		]);
		return redirect('RT/security')->with(['success'=>'Data Berhasil Diupdate!']);
	}
	public function hapus($id)
	{
		DB::table('security')->where('id', $id)->delete();
		return redirect('RT/security');
	}
}