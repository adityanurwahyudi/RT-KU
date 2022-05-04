<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Session;

class SecurityController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		$security = DB::table('security')->select('security.*')
				->leftjoin('users','users.id','security.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$no = 1;
		return view('RT.security', compact('security', 'no'));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_security');
	}
	public function proses(Request $request)
	{
		
		$id_users = Auth::guard('admin')->user()->id;
			if($request->hasFile('gambar')){
				$file = $request->file('gambar');
				$path = 'upload/security';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
				  
			$gambar = DB::table('security')->insert([
				'id_users'	=> $id_users,
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
		
		$id_users = Auth::guard('admin')->user()->id;
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
			'id_users'	=> $id_users,
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