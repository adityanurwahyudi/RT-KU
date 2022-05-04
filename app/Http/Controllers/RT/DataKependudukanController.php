<?php

namespace App\Http\Controllers\RT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;

class DataKependudukanController extends Controller
{
	public function tambah()
	{
		return view('RT.formcreate.c_datakependudukan');
	}
	public function proses(Request $request)
	{
			$id_users = Auth::guard('admin')->user()->id;
	
			if($request->hasFile('fotoprofile')){
				$file = $request->file('fotoprofile');
				$path = 'upload/datakependudukan';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
			
			DB::table('datakependudukan')->insert([
				'id_users'	=> $id_users,
				'nama' =>  $request->nama,
				'nik' =>  $request->nik,
                'nokk'	=> $request->nokk,
				'email' =>  $request->email,
				'telepon' =>  $request->telepon,
                'alamat'	=> $request->alamat,
				'agama' =>  $request->agama,
				'jeniskelamin' =>  $request->jeniskelamin,
                'tanggallahir'	=> $request->tanggallahir,
				'usia' => $request->usia,
				'kewarganegaraan' =>  $request->kewarganegaraan,
				'pekerjaan' =>  $request->pekerjaan,
                'statuspernikahan'	=> $request->statuspernikahan,
				'fotoprofile' => $namefile,
			]);
		
			return redirect('warga/data-warga')->with(['success'=>'Data Berhasil Ditambahkan!']);
	
	}
	public function prosess(Request $request)
	{
			$id_users = Auth::guard('admin')->user()->id;
	
			if($request->hasFile('fotoprofile')){
				$file = $request->file('fotoprofile');
				$path = 'upload/datakependudukan';
				$namefile = uniqid().'.'.$file->getClientOriginalExtension();
				$file->move($path, $namefile);
			}else{
				$namefile = null;
			}
			
			DB::table('datakependudukan')->insert([
				'id_users'	=> $id_users,
				'nama' =>  $request->nama,
				'nik' =>  $request->nik,
                'nokk'	=> $request->nokk,
				'email' =>  $request->email,
				'telepon' =>  $request->telepon,
                'alamat'	=> $request->alamat,
				'agama' =>  $request->agama,
				'jeniskelamin' =>  $request->jeniskelamin,
                'tanggallahir'	=> $request->tanggallahir,
				'usia' => $request->usia,
				'kewarganegaraan' =>  $request->kewarganegaraan,
				'pekerjaan' =>  $request->pekerjaan,
                'statuspernikahan'	=> $request->statuspernikahan,
				'fotoprofile' => $namefile,
			]);
		
			return redirect('RT/data-warga')->with(['success'=>'Data Berhasil Ditambahkan!']);
	
	}
	
	public function edit($id)
	{
		$datakependudukan = DB::table('datakependudukan')->where('id', $id)->get();
		return view('RT.formedit.e_datakependudukan', ['datakependudukan' => $datakependudukan]);
	}
	public function cetak_datawarga()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
		
		$datakependudukan = DB::table('datakependudukan')
				->select('datakependudukan.*')
				->leftjoin('users','users.id','datakependudukan.id_users')
				->where('users.rw', $rw)
				->where('users.rt', $rt)
				->get ();
 
    	$pdf = PDF::loadview('RT.laporan.cetak_datawarga',['datakependudukan'=>$datakependudukan]);
    	return $pdf->stream();
    }
	public function cetak_datawargatidakmampu()
    {
        $rt = Auth::guard('admin')->user()->rt;
        $rw = Auth::guard('admin')->user()->rw;
		
        $kepentingan = DB::table('bobot_kepentingan')->sum('rating_kepentingan');
        $data['kepentingan'] = $kepentingan / 2;
		
		$data['normalisasi'] = DB::table('hasil_normalisasi')
		->join('users','users.id','hasil_normalisasi.id_users')
		->where('rt',$rt)
		->where('rw',$rw)   
		->orderBy('rank','DESC') 
		->get();
 
    	$pdf = PDF::loadview('RT.laporan.cetak_datawargatidakmampu',$data);
    	return $pdf->stream();
    }
    public function update(Request $request)
	{
		$id_users = Auth::guard('admin')->user()->id;

		$datakependudukan = DB::table('datakependudukan')->where('id',$request->id)->first();
		if($request->hasFile('fotoprofile')){
			$file = $request->file('fotoprofile');
			$path = 'upload/datakependudukan';
			$namefile = uniqid().'.'.$file->getClientOriginalExtension();
			$file->move($path, $namefile);
		}else{
			$namefile = $datakependudukan->fotoprofile;
		}
			  
		$fotoprofile = DB::table('datakependudukan')->where('id', $request->id)->update([
			'id_users'	=> $id_users,
			'nama' =>  $request->nama,
			'nik' =>  $request->nik,
			'nokk'	=> $request->nokk,
			'email' =>  $request->email,
			'telepon' =>  $request->telepon,
			'alamat'	=> $request->alamat,
			'agama' =>  $request->agama,
			'jeniskelamin' =>  $request->jeniskelamin,
			'tanggallahir'	=> $request->tanggallahir,
			'usia' => $request->usia,
			'kewarganegaraan' =>  $request->kewarganegaraan,
			'pekerjaan' =>  $request->pekerjaan,
			'statuspernikahan'	=> $request->statuspernikahan,
			'fotoprofile' => $namefile,
	]);
		return redirect('RT/data-warga')->with(['success'=>'Data Berhasil Diupdate!']);;
	}
	public function hapus($id)
	{
		DB::table('datakependudukan')->where('id', $id)->delete();
		return redirect('RT/data-warga');
	}
}