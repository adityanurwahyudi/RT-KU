<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
	public function index()
	{
		$profile = DB::table('profile')->get();
		$no = 1;
		return view('RT.profile',compact('profile', 'no'));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_profile');
	}
	public function proses(Request $request)
	{
			if($request->hasFile('profilert'))
			if($request->hasFile('strukturorganisasi'))
			{
				$file = $request->file('profilert');
				$file1 = $request->file('strukturorganisasi');
				$path = 'upload/profile';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$namefile1 = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
				$file1->move($path, $namefile1);
			}else{
				$namefile = null;
				$namefile1 = null;
			}
			
			$visi = $request->visi;
			$misi = $request->misi;
			foreach ($visi as $satuVisi)
			foreach ($misi as $satuMisi) {
				DB::table('profile')->insert([
				'nama' =>  $request->nama,
				'tanggal' =>  $request->tanggal,
				'deskripsi' =>  $request->deskripsi,
				'profilert' => $namefile,
				'strukturorganisasi' => $namefile1,
				'visi' => $satuVisi,
				'misi' =>  $satuMisi,
				'email' =>  $request->email,
				'alamat' =>  $request->alamat,
				'telepon' =>  $request->telepon,
				'urlmap' =>  $request->urlmap,
				]);
			}
			return redirect('RT/profile')->with(['success'=>'Data Berhasil Ditambahkan!']);;
	
	}
	public function edit($id)
	{
		$profile = DB::table('profile')->where('id', $id)->get();
		return view('RT.formedit.e_profile', ['profile' => $profile]);
	}
	public function update(Request $request)
	{
		$profile = DB::table('profile')->where('id',$request->id)->first();
		if($request->hasFile('profilert'))
		if($request->hasFile('strukturorganisasi'))
		{
			$file = $request->file('profilert');
			$file = $request->file('strukturorganisasi');
			$path = 'upload/profile';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$namefile1 = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
			$file->move($path, $namefile1);
		}else{
			$namefile = $profile->profilert;
			$namefile1 = $profile->strukturorganisasi;
		}
			  
		$profilert = DB::table('profile')->where('id', $request->id)->update([
				'nama' =>  $request->nama,
				'deskripsi' =>  $request->deskripsi,
				'profilert' => $namefile,
				'strukturorganisasi' => $namefile1,
				'visi' =>  $request->visi,
				'misi' =>  $request->misi,
				'email' =>  $request->email,
				'alamat' =>  $request->alamat,
				'telepon' =>  $request->telepon,
				'urlmap' =>  $request->urlmap,
				'status' =>  $request->status,
			
		]);
		return redirect('RT/profile')->with(['success'=>'Data Berhasil Diupdate!']);;
	}
	public function hapus($id)
	{
		DB::table('profile')->where('id', $id)->delete();
		return redirect('RT/profile');
	}
}