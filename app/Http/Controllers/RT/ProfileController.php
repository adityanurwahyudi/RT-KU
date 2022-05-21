<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Http\Controllers\RT\Exception;

class ProfileController extends Controller
{
	public function index()
	{
		$rt = Auth::guard('admin')->user()->rt;
		$rw = Auth::guard('admin')->user()->rw;

		$profile = DB::table('profile')->select('profile.*')
				->leftjoin('users','users.id','profile.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get();
		$no = 1;
		return view('RT.profile',compact('profile', 'no'));
	}
	public function tambah()
	{
		return view('RT.formcreate.c_profile');
	}
	
public function proses(Request $request)
{
	$id_users = Auth::guard('admin')->user()->id;

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
		}{
			DB::table('profile')->insert([
			'id_users'	=> $id_users,
			'nama' =>  $request->nama,
			'tanggal' =>  $request->tanggal,
			'deskripsi' =>  $request->deskripsi,
			'profilert' => $namefile,
			'strukturorganisasi' => $namefile1,
			'email' =>  $request->email,
			'alamat' =>  $request->alamat,
			'telepon' =>  $request->telepon,
			'urlmap' =>  $request->urlmap,
			]);
		}
		return redirect('RT/profile')->with(['success'=>'Data Berhasil Ditambahkan!']);

}

public function getTelpon()
{
	$telpon = $_GET['telpon'];
	$data=DB::table('users')
	->where('telpon',$telpon)
	->get();
	if(count($data)>0)
	{
	$check=true;
	}else{
		$check=false;
	}

	echo $check;
}
public function getEmail()
{
	$email = $_GET['email'];
	$data=DB::table('users')
	->where('email',$email)
	->get();
	if(count($data)>0)
	{
	$check=true;
	}else{
		$check=false;
	}

	echo $check;
}
	public function edit($id)
	{
		$profile = DB::table('profile')->where('id', $id)->get();
		return view('RT.formedit.e_profile', ['profile' => $profile]);
	}
	public function update(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;

		$profile = DB::table('profile')->where('id',$request->id)->first();
		
			  
		$profilert = DB::table('profile')->where('id', $request->id)->update([
				'id_users'	=> $id_users,
				'nama' =>  $request->nama,
				'deskripsi' =>  $request->deskripsi,
				'email' =>  $request->email,
				'alamat' =>  $request->alamat,
				'telepon' =>  $request->telepon,
				'urlmap' =>  $request->urlmap,
			
		]);
		return redirect('RT/profile')->with(['success'=>'Data Berhasil Diupdate!']);;
	}
	public function hapus($id)
	{
		DB::table('profile')->where('id', $id)->delete();
		return redirect('RT/profile');
	}
}